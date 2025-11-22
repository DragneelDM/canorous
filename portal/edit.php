<?php
require 'config.php';

$id = intval($_GET['id']);
$res = $db->prepare("SELECT * FROM employees WHERE id = ?");
$res->bind_param("i", $id);
$res->execute();
$row = $res->get_result()->fetch_assoc();

if (!$row) die("Invalid employee.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $db->prepare("
        UPDATE employees 
        SET name=?, designation=?, department=?, email=?, phone=?
        WHERE id=?
    ");
    $stmt->bind_param("sssssi", $name, $designation, $department, $email, $phone, $id);
    $stmt->execute();

    header("Location: employees.php");
    exit;
}

include '_header.php';
?>
<h2>Edit Employee</h2>

<form method="post">
    <label>Name</label><br>
    <input name="name" value="<?= h($row['name']) ?>"><br><br>

    <label>Designation</label><br>
    <input name="designation" value="<?= h($row['designation']) ?>"><br><br>

    <label>Department</label><br>
    <input name="department" value="<?= h($row['department']) ?>"><br><br>

    <label>Email</label><br>
    <input name="email" value="<?= h($row['email']) ?>"><br><br>

    <label>Phone</label><br>
    <input name="phone" value="<?= h($row['phone']) ?>"><br><br>

    <button class="btn">Save Changes</button>
</form>

<?php include '_footer.php'; ?>
