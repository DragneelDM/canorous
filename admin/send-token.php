<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require authentication
require_admin_auth();

$employee_id = trim($_GET['id'] ?? '');
$success = '';
$error = '';

// Get employee details
try {
    $mysqli = get_db_connection();
    $sql = "SELECT employee_id, name, email, token, token_expires_at
            FROM employees
            WHERE employee_id = ?
            LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $employee_id);
    $stmt->execute();
    $employee = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $mysqli->close();

    if (!$employee) {
        $error = 'Employee not found.';
    } elseif (empty($employee['email'])) {
        $error = 'Employee does not have an email address.';
    } elseif (empty($employee['token'])) {
        $error = 'Employee does not have a verification token. Please generate one first.';
    }
} catch (Exception $e) {
    $error = 'Database error: ' . $e->getMessage();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error && $employee) {
    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($csrf_token)) {
        $error = 'Invalid CSRF token.';
    } else {
        try {
            $mail = new PHPMailer(true);

            // Server settings
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;

            // Set encryption based on port
            if (SMTP_PORT == 465) {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL for port 465
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS for port 587
            }
            $mail->Port = SMTP_PORT;

            // Recipients
            $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
            $mail->addAddress($employee['email'], $employee['name']);
            $mail->addReplyTo(SMTP_FROM_EMAIL, SMTP_FROM_NAME);

            // Content
            $verification_url = 'https://' . $_SERVER['HTTP_HOST'] . '/verify.php?t=' . $employee['token'];
            $expires_at = $employee['token_expires_at'] ? date('F j, Y', strtotime($employee['token_expires_at'])) : 'Never';

            $mail->isHTML(true);
            $mail->Subject = 'Your Employee Verification Link - Canorous Technologies';
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background: #1e40af; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                        .content { background: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
                        .button { display: inline-block; padding: 12px 24px; background: #2563eb; color: white; text-decoration: none; border-radius: 6px; margin: 20px 0; }
                        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #6b7280; font-size: 14px; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>Employee Verification</h1>
                        </div>
                        <div class='content'>
                            <p>Dear {$employee['name']},</p>

                            <p>Your employee verification link for Canorous Technologies is ready. Click the button below to view your verified employee information:</p>

                            <p style='text-align: center;'>
                                <a href='{$verification_url}' class='button'>Verify Employee Information</a>
                            </p>

                            <p>Or copy and paste this link into your browser:<br>
                            <a href='{$verification_url}'>{$verification_url}</a></p>

                            <p><strong>Important:</strong> This verification link will expire on {$expires_at}.</p>

                            <div class='footer'>
                                <p>If you did not request this verification or have any questions, please contact HR at hr@canorous.com</p>
                                <p>© 2026 Canorous Technologies. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </body>
                </html>
            ";
            $mail->AltBody = "Dear {$employee['name']},\n\nYour employee verification link for Canorous Technologies is ready.\n\nVisit: {$verification_url}\n\nThis link will expire on {$expires_at}.\n\nIf you did not request this, please contact HR.\n\n© 2026 Canorous Technologies";

            $mail->send();
            $success = 'Verification email sent successfully to ' . $employee['email'];
        } catch (Exception $e) {
            $error = 'Email could not be sent. Error: ' . $mail->ErrorInfo;
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Verification Email | Canorous Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <nav class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/admin/dashboard.php" class="text-xl font-bold text-white">Canorous Admin</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/admin/dashboard.php" class="text-sm text-gray-400 hover:text-gray-300">← Back to Dashboard</a>
                    <a href="/admin/logout.php" class="text-sm text-red-400 hover:text-red-300">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-bold mb-6">Send Verification Email</h2>

        <?php if ($success): ?>
            <div class="bg-green-900/50 border border-green-700 rounded-lg p-4 mb-6">
                <p class="text-green-200"><?= h($success) ?></p>
                <a href="/admin/dashboard.php" class="text-green-400 hover:text-green-300 text-sm mt-2 inline-block">← Back to Dashboard</a>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="bg-red-900/50 border border-red-700 rounded-lg p-4 mb-6">
                <p class="text-red-200"><?= h($error) ?></p>
                <a href="/admin/dashboard.php" class="text-red-400 hover:text-red-300 text-sm mt-2 inline-block">← Back to Dashboard</a>
            </div>
        <?php elseif ($employee && !$success): ?>
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Employee Details</h3>
                <dl class="space-y-3 mb-6">
                    <div>
                        <dt class="text-sm text-gray-400">Name</dt>
                        <dd class="text-white"><?= h($employee['name']) ?></dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Employee ID</dt>
                        <dd class="text-white"><?= h($employee['employee_id']) ?></dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Email</dt>
                        <dd class="text-white"><?= h($employee['email']) ?></dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Token Expires</dt>
                        <dd class="text-white">
                            <?= $employee['token_expires_at'] ? date('F j, Y', strtotime($employee['token_expires_at'])) : 'Never' ?>
                        </dd>
                    </div>
                </dl>

                <form method="POST" action="">
                    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
                    <div class="flex space-x-4">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors"
                        >
                            Send Email
                        </button>
                        <a
                            href="/admin/dashboard.php"
                            class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
