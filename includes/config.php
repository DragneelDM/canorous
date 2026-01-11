<?php
declare(strict_types=1);

// Load environment variables
require_once __DIR__ . '/../vendor/autoload.php';
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Base URL configuration (for XAMPP subdirectory support)
// Auto-detect the base path from the current script location
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$base_path = dirname($script_name);
// If we're in the root or a direct PHP file, use empty string, otherwise use the directory
$base_path = ($base_path === '/' || $base_path === '\\') ? '' : $base_path;
$base_path = $_ENV['BASE_URL_OVERRIDE'] ?? $base_path;
define('BASE_URL', $base_path);

// Database configuration
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_USER', $_ENV['DB_USER'] ?? 'rqqsllyj_MPmadhan');
define('DB_PASS', $_ENV['DB_PASS'] ?? 'madhan@can-india.co.in');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'rqqsllyj_EmployeesDB');

// Security configuration
define('TOKEN_EXPIRY_DAYS', (int)($_ENV['TOKEN_EXPIRY_DAYS'] ?? 90));
define('RATE_LIMIT_MAX_ATTEMPTS', (int)($_ENV['RATE_LIMIT_MAX_ATTEMPTS'] ?? 10));
define('RATE_LIMIT_WINDOW_MINUTES', (int)($_ENV['RATE_LIMIT_WINDOW_MINUTES'] ?? 60));
define('RATE_LIMIT_LOCKOUT_MINUTES', (int)($_ENV['RATE_LIMIT_LOCKOUT_MINUTES'] ?? 30));

// Email configuration
define('SMTP_HOST', $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com');
define('SMTP_PORT', (int)($_ENV['SMTP_PORT'] ?? 587));
define('SMTP_SECURE', $_ENV['SMTP_SECURE'] ?? 'tls'); // 'tls' for port 587, 'ssl' for port 465
define('SMTP_USERNAME', $_ENV['SMTP_USERNAME'] ?? '');
define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD'] ?? '');
define('SMTP_FROM_EMAIL', $_ENV['SMTP_FROM_EMAIL'] ?? 'noreply@canorous.com');
define('SMTP_FROM_NAME', $_ENV['SMTP_FROM_NAME'] ?? 'Canorous Technologies');

// Admin configuration
define('ADMIN_USERNAME', $_ENV['ADMIN_USERNAME'] ?? 'admin');
define('ADMIN_PASSWORD_HASH', $_ENV['ADMIN_PASSWORD_HASH'] ?? '');

// Application settings
define('APP_ENV', $_ENV['APP_ENV'] ?? 'production');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? 'false', FILTER_VALIDATE_BOOLEAN));

// Helper function to escape HTML output
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Helper function to generate asset URLs with base path
function asset(string $path): string {
    // Remove leading slash if present
    $path = ltrim($path, '/');
    return BASE_URL . '/' . $path;
}

// Generate strong token for employee verification
function generate_token(): string {
    return bin2hex(random_bytes(32)); // 64-char hex
}

// Get database connection
function get_db_connection() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        throw new Exception('Database connection failed: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

// Load JSON data file
function load_json_data(string $filepath): array {
    $fullPath = __DIR__ . '/../data/' . $filepath;
    if (!file_exists($fullPath)) {
        return [];
    }
    $content = file_get_contents($fullPath);
    $data = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [];
    }
    return $data ?? [];
}

// Rate limiting functions
function get_client_ip(): string {
    // Check for proxy headers first
    $ip_keys = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'REMOTE_ADDR'];
    foreach ($ip_keys as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = $_SERVER[$key];
            // Handle multiple IPs (X-Forwarded-For can contain multiple IPs)
            if (strpos($ip, ',') !== false) {
                $ip = trim(explode(',', $ip)[0]);
            }
            // Validate IP address
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
    return '0.0.0.0';
}

function is_rate_limited(string $ip): array {
    try {
        $mysqli = get_db_connection();

        // Clean up old attempts (older than window)
        $window_minutes = RATE_LIMIT_WINDOW_MINUTES;
        $cleanup_sql = "DELETE FROM verification_attempts
                       WHERE last_attempt_at < DATE_SUB(NOW(), INTERVAL ? MINUTE)
                       AND (locked_until IS NULL OR locked_until < NOW())";
        $stmt = $mysqli->prepare($cleanup_sql);
        $stmt->bind_param('i', $window_minutes);
        $stmt->execute();
        $stmt->close();

        // Check if IP is locked
        $sql = "SELECT attempts, locked_until
                FROM verification_attempts
                WHERE ip_address = ?
                AND (last_attempt_at >= DATE_SUB(NOW(), INTERVAL ? MINUTE)
                     OR locked_until >= NOW())
                LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $ip, $window_minutes);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($row = $res->fetch_assoc()) {
            $locked_until = $row['locked_until'];
            if ($locked_until && strtotime($locked_until) > time()) {
                $stmt->close();
                $mysqli->close();
                return [
                    'limited' => true,
                    'attempts' => $row['attempts'],
                    'locked_until' => $locked_until
                ];
            }

            if ($row['attempts'] >= RATE_LIMIT_MAX_ATTEMPTS) {
                $stmt->close();
                $mysqli->close();
                return [
                    'limited' => true,
                    'attempts' => $row['attempts'],
                    'locked_until' => null
                ];
            }
        }

        $stmt->close();
        $mysqli->close();
        return ['limited' => false, 'attempts' => 0];
    } catch (Exception $e) {
        // On error, allow the request (fail open for availability)
        return ['limited' => false, 'attempts' => 0];
    }
}

function record_verification_attempt(string $ip, bool $success): void {
    try {
        $mysqli = get_db_connection();

        // Check if record exists
        $sql = "SELECT id, attempts FROM verification_attempts
                WHERE ip_address = ?
                AND last_attempt_at >= DATE_SUB(NOW(), INTERVAL ? MINUTE)
                LIMIT 1";
        $window_minutes = RATE_LIMIT_WINDOW_MINUTES;
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $ip, $window_minutes);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($row = $res->fetch_assoc()) {
            // Update existing record
            $new_attempts = $success ? 0 : ($row['attempts'] + 1);
            $locked_until = null;

            // Lock if exceeded max attempts
            if ($new_attempts >= RATE_LIMIT_MAX_ATTEMPTS) {
                $lockout_minutes = RATE_LIMIT_LOCKOUT_MINUTES;
                $locked_until = date('Y-m-d H:i:s', time() + ($lockout_minutes * 60));
            }

            $update_sql = "UPDATE verification_attempts
                          SET attempts = ?, last_attempt_at = NOW(), locked_until = ?
                          WHERE id = ?";
            $update_stmt = $mysqli->prepare($update_sql);
            $update_stmt->bind_param('isi', $new_attempts, $locked_until, $row['id']);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // Insert new record
            $insert_sql = "INSERT INTO verification_attempts
                          (ip_address, attempts, first_attempt_at, last_attempt_at)
                          VALUES (?, 1, NOW(), NOW())";
            $insert_stmt = $mysqli->prepare($insert_sql);
            $insert_stmt->bind_param('s', $ip);
            $insert_stmt->execute();
            $insert_stmt->close();
        }

        $stmt->close();
        $mysqli->close();
    } catch (Exception $e) {
        // Silently fail - don't break verification on rate limiting errors
    }
}

// Log verification attempt to audit trail
function log_verification(string $token, ?string $employee_id, string $ip, bool $success, ?string $error_msg = null): void {
    try {
        $mysqli = get_db_connection();
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

        $sql = "INSERT INTO verification_logs
                (token, employee_id, ip_address, user_agent, success, error_message)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssssis', $token, $employee_id, $ip, $user_agent, $success, $error_msg);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    } catch (Exception $e) {
        // Silently fail - don't break verification on logging errors
    }
}
