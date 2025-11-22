<?php
require 'config.php';

$id = intval($_GET['id']);
$newToken = generate_token();

$stmt = $db->prepare("UPDATE employees SET token = ? WHERE id = ?");
$stmt->bind_param("si", $newToken, $id);
$stmt->execute();

echo "<h2>New Token Generated:</h2>";
echo "<p><code>$newToken</code></p>";
echo "<p><a href='employees.php'>Back to list</a></p>";
