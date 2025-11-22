<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $token = generate_token();

    $stmt = $db->prepare("
        INSERT INTO employees (employee_id, token, name, designation, department, status, email, phone)
        VALUES (?, ?, ?, ?, ?, 'active', ?, ?)
    ");
    $stmt->bind_param("sssssss", $employee_id, $token, $name, $designation, $department, $email, $phone);
    $stmt->execute();

    header("Location: employees.php");
    exit;
}

include '_header.php';
?>
<h2>Add New Employee</h2>

<form method="post">
    <label>Employee ID</label><br>
    <input name="employee_id" required><br><br>

    <label>Name</label><br>
    <input name="name" required><br><br>

    <label>Designation</label><br>
    <input name="designation"><br><br>

    <label>Department</label><br>
    <input name="department"><br><br>

    <label>Email</label><br>
    <input name="email"><br><br>

    <label>Phone</label><br>
    <input name="phone"><br><br>

    <button class="btn">Create Employee</button>
</form>

<?php include '_footer.php'; ?>
