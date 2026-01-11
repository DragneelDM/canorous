<?php
declare(strict_types=1);

// Admin authentication helper functions

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is authenticated
function is_admin_logged_in(): bool {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Require admin authentication (redirect to login if not authenticated)
function require_admin_auth(): void {
    if (!is_admin_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}

// Login admin user
function login_admin(string $username, string $password): bool {
    // Load config
    require_once __DIR__ . '/../../includes/config.php';

    // Check credentials
    if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD_HASH)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_login_time'] = time();
        return true;
    }

    return false;
}

// Logout admin user
function logout_admin(): void {
    $_SESSION = [];
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    session_destroy();
}

// Get logged-in admin username
function get_admin_username(): string {
    return $_SESSION['admin_username'] ?? 'Admin';
}

// Generate CSRF token
function generate_csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF token
function verify_csrf_token(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
