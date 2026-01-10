<?php
declare(strict_types=1);

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'rqqsllyj_MPmadhan');
define('DB_PASS', 'madhan@can-india.co.in');
define('DB_NAME', 'rqqsllyj_EmployeesDB');

// Helper function to escape HTML output
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
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
