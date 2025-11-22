<?php
require 'config.php';

$result = $db->query("SELECT id, employee_id, name, designation, status, token FROM employees ORDER BY id DESC");
?>
<?php include '_header.php'; ?>
<h2>Employees</h2>

<a class="btn" href="create.php">➕ Add Employee</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Employee ID</th>
    <th>Name</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= h($row['id']) ?></td>
    <td><?= h($row['employee_id']) ?></td>
    <td><?= h($row['name']) ?></td>
    <td><?= h($row['status']) ?></td>
    <td>
        <a class="btn" href="edit.php?id=<?= h($row['id']) ?>">Edit</a>
        <a class="btn" href="regen.php?id=<?= h($row['id']) ?>">Regenerate Token</a>
        <a class="btn btn-danger" href="delete.php?id=<?= h($row['id']) ?>"
           onclick="return confirm('Deactivate this employee?');">Deactivate</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<?php include '_footer.php'; ?>
