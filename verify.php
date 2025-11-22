<?php
declare(strict_types=1);

// Simple helper to escape for HTML output
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// ---- CONFIG: set these to your DB credentials ----
define('DB_HOST', 'localhost');      // usually localhost on cPanel
define('DB_USER', 'rqqsllyj_MPmadhan');
define('DB_PASS', 'madhan@can-india.co.in');
define('DB_NAME', 'rqqsllyj_EmployeesDB');
// -------------------------------------------------

$token = $_GET['t'] ?? '';
$token = trim($token);

if ($token === '') {
    http_response_code(400);
    $error = 'Missing token parameter.';
} else {
    // basic token validation: allow hex/base64-ish tokens (adjust as you used)
    if (!preg_match('/^[A-Za-z0-9_\-+=]+$/', $token)) {
        http_response_code(400);
        $error = 'Invalid token format.';
    }
}

$employee = null;
if (!isset($error)) {
    // connect
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        http_response_code(500);
        $error = 'Database connection failed.';
    } else {
        // Prepared statement to find by token
        $sql = "SELECT employee_id, name, designation, department, status, photo_url, email, phone 
                FROM employees
                WHERE token = ? LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            http_response_code(500);
            $error = 'Database error (prepare).';
        } else {
            $stmt->bind_param('s', $token);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res && $row = $res->fetch_assoc()) {
                $employee = $row;
            } else {
                http_response_code(404);
                $error = 'Employee not found.';
            }
            $stmt->close();
        }
        $mysqli->close();
    }
}

// Render HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Employee Verification</title>
<style>
  body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f4f5f7; color:#111827; padding:28px; }
  .card { max-width:520px; margin:24px auto; background:#fff; padding:28px; border-radius:12px; box-shadow:0 12px 30px rgba(15,23,42,.06); }
  .photo { width:120px; height:120px; object-fit:cover; border-radius:12px; border:2px solid #e5e7eb; margin-bottom:16px; }
  dt { font-size:.78rem; color:#6b7280; text-transform:uppercase; margin-top:10px; }
  dd { margin:4px 0 12px; font-size:1rem; }
  .status { display:inline-block; padding:6px 10px; border-radius:999px; font-weight:600; }
  .status-active { background:#d1e7dd; color:#0f5132; }
  .status-inactive { background:#f8d7da; color:#842029; }
  .error { color:#b42318; font-weight:600; text-align:center; }
</style>
</head>
<body>
  <div class="card">
    <h2>Employee Verification</h2>

<?php if (isset($error)): ?>
    <p class="error"><?= h($error) ?></p>
<?php else: ?>
    <?php if (!empty($employee['photo_url'])): ?>
        <img src="<?= h($employee['photo_url']) ?>" alt="Photo" class="photo">
    <?php endif; ?>

    <dl>
      <dt>Name</dt>
      <dd><?= h($employee['name'] ?: '—') ?></dd>

      <dt>Employee ID</dt>
      <dd><?= h($employee['employee_id'] ?: '—') ?></dd>

      <dt>Designation</dt>
      <dd><?= h($employee['designation'] ?: '—') ?></dd>

      <dt>Department</dt>
      <dd><?= h($employee['department'] ?: '—') ?></dd>

      <dt>Email</dt>
      <dd><?= h($employee['email'] ?: '—') ?></dd>

      <dt>Phone</dt>
      <dd><?= h($employee['phone'] ?: '—') ?></dd>
    </dl>

    <?php
      $s = strtolower((string)($employee['status'] ?? 'inactive'));
      $s = in_array($s, ['active','inactive'], true) ? $s : 'inactive';
    ?>
    <p><span class="status status-<?= h($s) ?>"><?= ucfirst(h($s)) ?></span></p>
<?php endif; ?>

  </div>
</body>
</html>
