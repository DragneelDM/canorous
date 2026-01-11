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
<title>Canorous • Employee Verification</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    color-scheme: dark;
    --bg: #020617;
    --bg-secondary: rgba(15,23,42,.7);
    --card: rgba(15,23,42,.75);
    --card-border: rgba(148,163,184,.3);
    --text: #f1f5f9;
    --muted: #94a3b8;
    --accent: #38bdf8;
    --accent-strong: #0ea5e9;
    --error: #f87171;
  }

  * { box-sizing: border-box; }

  body {
    font-family: 'Inter', 'Geist', 'Segoe UI', system-ui, -apple-system, sans-serif;
    margin: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 32px;
    background: radial-gradient(circle at top, rgba(14,165,233,.25), transparent 45%) fixed,
                radial-gradient(circle at 20% 20%, rgba(59,130,246,.2), transparent 30%) fixed,
                linear-gradient(135deg, #010103 0%, #020617 35%, #0f172a 100%);
    color: var(--text);
  }

  .shell {
    width: min(960px, 100%);
    display: grid;
    gap: 32px;
  }

  header {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  header img {
    height: 48px;
    width: auto;
    object-fit: contain;
  }

  header h1 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    margin: 0;
    font-weight: 600;
  }

  header span {
    display: block;
    font-size: .95rem;
    color: var(--muted);
  }

  .card {
    background: var(--card);
    border: 1px solid var(--card-border);
    border-radius: 22px;
    padding: clamp(24px, 4vw, 40px);
    box-shadow: 0 30px 80px rgba(2,6,23,.55);
    backdrop-filter: blur(18px);
  }

  .card h2 {
    margin: 0 0 1.5rem;
    font-size: clamp(1.5rem, 3vw, 1.9rem);
    font-weight: 600;
  }

  .content {
    display: grid;
    gap: 24px;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    align-items: start;
  }

  .photo {
    width: min(160px, 40vw);
    aspect-ratio: 1;
    border-radius: 18px;
    object-fit: cover;
    border: 2px solid rgba(56,189,248,.4);
    box-shadow: 0 10px 30px rgba(15,23,42,.6);
    justify-self: center;
  }

  dl {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 18px;
    margin: 0;
  }

  dt {
    font-size: .78rem;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 6px;
  }

  dd {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 500;
    color: var(--text);
  }

  .status-row {
    margin-top: 28px;
  }

  .status-label {
    font-size: .85rem;
    text-transform: uppercase;
    letter-spacing: .12em;
    color: var(--muted);
  }

  .status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 999px;
    font-weight: 600;
    margin-top: 8px;
  }

  .status svg {
    width: 16px;
    height: 16px;
  }

  .status-active {
    background: rgba(34,197,94,.12);
    color: #4ade80;
    border: 1px solid rgba(34,197,94,.4);
  }

  .status-inactive {
    background: rgba(248,113,113,.12);
    color: #fca5a5;
    border: 1px solid rgba(248,113,113,.35);
  }

  .error-card {
    text-align: center;
    padding: 2rem;
    border-radius: 18px;
    border: 1px solid rgba(248,113,113,.25);
    background: rgba(239,68,68,.08);
    color: var(--error);
    font-weight: 600;
  }

  .error-card p {
    margin: 0 0 1.25rem;
  }

  .error-card a {
    display: inline-block;
    color: var(--text);
    text-decoration: none;
    font-weight: 600;
    padding: 0.65rem 1.4rem;
    border-radius: 999px;
    background: linear-gradient(120deg, var(--accent), var(--accent-strong));
    transition: opacity .2s ease;
  }

  .error-card a:hover { opacity: .9; }

  footer {
    text-align: center;
    font-size: .85rem;
    color: var(--muted);
  }
</style>
</head>
<body>
  <div class="shell">
    <header>
      <img src="/images/Company-logo.png" alt="Canorous logo">
      <div>
        <h1>Canorous Technologies</h1>
        <span>Employee Credential Validation</span>
      </div>
    </header>

    <div class="card">
      <h2>Verification Details</h2>

<?php if (isset($error)): ?>
      <div class="error-card">
        <p><?= h($error) ?></p>
        <a href="/">Return to canorous.com</a>
      </div>
<?php else: ?>
      <div class="content">
        <?php if (!empty($employee['photo_url'])): ?>
          <img src="<?= h($employee['photo_url']) ?>" alt="Employee photo" class="photo">
        <?php endif; ?>

        <dl>
          <div>
            <dt>Name</dt>
            <dd><?= h($employee['name'] ?: '—') ?></dd>
          </div>
          <div>
            <dt>Employee ID</dt>
            <dd><?= h($employee['employee_id'] ?: '—') ?></dd>
          </div>
          <div>
            <dt>Designation</dt>
            <dd><?= h($employee['designation'] ?: '—') ?></dd>
          </div>
          <div>
            <dt>Department</dt>
            <dd><?= h($employee['department'] ?: '—') ?></dd>
          </div>
          <div>
            <dt>Email</dt>
            <dd><?= h($employee['email'] ?: '—') ?></dd>
          </div>
          <div>
            <dt>Phone</dt>
            <dd><?= h($employee['phone'] ?: '—') ?></dd>
          </div>
        </dl>
      </div>

      <?php
        $s = strtolower((string)($employee['status'] ?? 'inactive'));
        $s = in_array($s, ['active','inactive'], true) ? $s : 'inactive';
      ?>
      <div class="status-row">
        <span class="status-label">Employment Status</span>
        <div class="status status-<?= h($s) ?>">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <?= ucfirst(h($s)) ?>
        </div>
      </div>
<?php endif; ?>

    </div>

    <footer>© <?= date('Y') ?> Canorous. All rights reserved.</footer>
  </div>
</body>
</html>
