<?php
require_once 'config.php';
requireLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: employees.php");
    exit;
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
    die('Database connection failed.');
}

// Soft delete (set status to inactive) or hard delete
// Using soft delete for safety
$stmt = $mysqli->prepare("UPDATE employees SET status = 'inactive' WHERE employee_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();
$mysqli->close();

header("Location: employees.php?deleted=1");
exit;

