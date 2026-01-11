<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

// Get client IP for rate limiting
$client_ip = get_client_ip();

// Check rate limiting first
$rate_limit_check = is_rate_limited($client_ip);
if ($rate_limit_check['limited']) {
    http_response_code(429); // Too Many Requests
    if ($rate_limit_check['locked_until']) {
        $until = date('g:i A', strtotime($rate_limit_check['locked_until']));
        $error = "Too many failed verification attempts. Please try again after $until.";
    } else {
        $error = 'Too many verification attempts. Please try again later.';
    }
}

$token = $_GET['t'] ?? '';
$token = trim($token);

if (!isset($error) && $token === '') {
    http_response_code(400);
    $error = 'Missing token parameter.';
    record_verification_attempt($client_ip, false);
} elseif (!isset($error)) {
    // basic token validation: allow hex/base64-ish tokens (adjust as you used)
    if (!preg_match('/^[A-Za-z0-9_\-+=]+$/', $token)) {
        http_response_code(400);
        $error = 'Invalid token format.';
        record_verification_attempt($client_ip, false);
    }
}

$employee = null;
if (!isset($error)) {
    try {
        $mysqli = get_db_connection();

        // Prepared statement to find by token and check expiration
        $sql = "SELECT employee_id, name, designation, department, status, photo_url, email, phone,
                       token_created_at, token_expires_at
                FROM employees
                WHERE token = ?
                LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            http_response_code(500);
            $error = 'Database error (prepare).';
        } else {
            $stmt->bind_param('s', $token);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res && $row = $res->fetch_assoc()) {
                // Check if token has expired
                if ($row['token_expires_at'] !== null && strtotime($row['token_expires_at']) < time()) {
                    http_response_code(410); // 410 Gone - resource expired
                    $error = 'This verification token has expired. Please contact HR for a new verification link.';
                    record_verification_attempt($client_ip, false);
                } else {
                    $employee = $row;
                    record_verification_attempt($client_ip, true); // Successful verification
                }
            } else {
                http_response_code(404);
                $error = 'Employee not found.';
                record_verification_attempt($client_ip, false);
            }
            $stmt->close();
        }
        $mysqli->close();
    } catch (Exception $e) {
        http_response_code(500);
        $error = 'Database connection failed.';
        record_verification_attempt($client_ip, false);
    }
}

// Set page metadata
$page_title = 'Employee Verification | Canorous';
$page_description = 'Verify employee information with Canorous Technologies';

// Render HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($page_title) ?></title>
    <meta name="description" content="<?= h($page_description) ?>">
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.4/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center py-8 px-4">
  <div class="max-w-2xl w-full bg-gray-800 rounded-xl shadow-2xl p-8 md:p-12">
    <h2 class="text-3xl font-bold mb-8 text-center">Employee Verification</h2>

<?php if (isset($error)): ?>
    <div class="bg-red-900/50 border border-red-700 rounded-lg p-6 text-center">
        <p class="text-red-200 font-semibold text-lg"><?= h($error) ?></p>
        <a href="/" class="mt-4 inline-block text-blue-400 hover:text-blue-300">Return to Homepage</a>
    </div>
<?php else: ?>
    <div class="space-y-6">
        <?php if (!empty($employee['photo_url'])): ?>
            <div class="flex justify-center mb-6">
                <img 
                    src="<?= h($employee['photo_url']) ?>" 
                    alt="Employee Photo" 
                    class="w-32 h-32 object-cover rounded-xl border-2 border-gray-700"
                />
            </div>
        <?php endif; ?>

        <dl class="space-y-4">
            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Name</dt>
                <dd class="text-lg text-white"><?= h($employee['name'] ?: '—') ?></dd>
            </div>

            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Employee ID</dt>
                <dd class="text-lg text-white"><?= h($employee['employee_id'] ?: '—') ?></dd>
            </div>

            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Designation</dt>
                <dd class="text-lg text-white"><?= h($employee['designation'] ?: '—') ?></dd>
            </div>

            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Department</dt>
                <dd class="text-lg text-white"><?= h($employee['department'] ?: '—') ?></dd>
            </div>

            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Email</dt>
                <dd class="text-lg text-white">
                    <?php if (!empty($employee['email'])): ?>
                        <a href="mailto:<?= h($employee['email']) ?>" class="text-blue-400 hover:text-blue-300">
                            <?= h($employee['email']) ?>
                        </a>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </dd>
            </div>

            <div>
                <dt class="text-xs uppercase tracking-wider text-gray-400 mb-1">Phone</dt>
                <dd class="text-lg text-white"><?= h($employee['phone'] ?: '—') ?></dd>
            </div>
        </dl>

        <div class="pt-4 border-t border-gray-700">
            <?php
                $s = strtolower((string)($employee['status'] ?? 'inactive'));
                $s = in_array($s, ['active','inactive'], true) ? $s : 'inactive';
                $statusClass = $s === 'active' 
                    ? 'bg-green-900/50 text-green-200 border-green-700' 
                    : 'bg-red-900/50 text-red-200 border-red-700';
            ?>
            <div class="flex items-center gap-3">
                <span class="text-sm uppercase tracking-wider text-gray-400">Status:</span>
                <span class="px-4 py-2 rounded-full border font-semibold <?= $statusClass ?>">
                    <?= ucfirst(h($s)) ?>
                </span>
            </div>
        </div>

        <div class="pt-6 text-center">
            <a href="/" class="text-blue-400 hover:text-blue-300">Return to Homepage</a>
        </div>
    </div>
<?php endif; ?>

  </div>
</body>
</html>
