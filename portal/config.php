<?php
// portal/config.php
declare(strict_types=1);

$db = new mysqli(
    'localhost',
    'rqqsllyj_MPmadhan',
    'madhan@can-india.co.in',
    'rqqsllyj_EmployeesDB'
);

if ($db->connect_errno) {
    die("Database connection failed: " . $db->connect_error);
}

// helper to escape HTML
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// generate strong token
function generate_token(): string {
    return bin2hex(random_bytes(32)); // 64-char hex
}
