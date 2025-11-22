<?php
// PHP Information and Configuration Test
// Access this file to verify PHP is working on your server

header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Configuration Test - Canorous Portal</title>
    <style>
        body { 
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; 
            background: #f4f5f7; 
            color: #111827; 
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }
        h1 { color: #111827; margin-top: 0; }
        h2 { color: #374151; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px; }
        .success { color: #059669; font-weight: 600; }
        .error { color: #dc2626; font-weight: 600; }
        .info { color: #2563eb; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 8px 12px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #f9fafb; font-weight: 600; }
        code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-family: 'Courier New', monospace; }
    </style>
</head>
<body>
    <div class="card">
        <h1>PHP Configuration Test</h1>
        <p class="info">This page verifies that PHP is working correctly on your server.</p>
    </div>

    <div class="card">
        <h2>PHP Version</h2>
        <p class="success">✓ PHP Version: <?= phpversion() ?></p>
    </div>

    <div class="card">
        <h2>Server Information</h2>
        <table>
            <tr>
                <th>Server Software</th>
                <td><?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') ?></td>
            </tr>
            <tr>
                <th>Document Root</th>
                <td><code><?= htmlspecialchars($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') ?></code></td>
            </tr>
            <tr>
                <th>Script Path</th>
                <td><code><?= htmlspecialchars(__FILE__) ?></code></td>
            </tr>
            <tr>
                <th>Current Directory</th>
                <td><code><?= htmlspecialchars(__DIR__) ?></code></td>
            </tr>
        </table>
    </div>

    <div class="card">
        <h2>PHP Extensions</h2>
        <?php
        $required = ['mysqli', 'session', 'mbstring'];
        $loaded = get_loaded_extensions();
        ?>
        <table>
            <?php foreach ($required as $ext): ?>
                <tr>
                    <th><?= htmlspecialchars($ext) ?></th>
                    <td>
                        <?php if (in_array($ext, $loaded)): ?>
                            <span class="success">✓ Loaded</span>
                        <?php else: ?>
                            <span class="error">✗ Not Loaded</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="card">
        <h2>Database Connection Test</h2>
        <?php
        // Test database connection (using same config as config.php)
        $db_host = 'localhost';
        $db_user = 'rqqsllyj_MPmadhan';
        $db_pass = 'madhan@can-india.co.in';
        $db_name = 'rqqsllyj_EmployeesDB';
        
        $mysqli = @new mysqli($db_host, $db_user, $db_pass, $db_name);
        
        if ($mysqli->connect_errno) {
            echo '<p class="error">✗ Database Connection Failed</p>';
            echo '<p>Error: ' . htmlspecialchars($mysqli->connect_error) . '</p>';
        } else {
            echo '<p class="success">✓ Database Connection Successful</p>';
            echo '<p>Connected to: <code>' . htmlspecialchars($db_name) . '</code></p>';
            $mysqli->close();
        }
        ?>
    </div>

    <div class="card">
        <h2>File Permissions</h2>
        <table>
            <tr>
                <th>config.php</th>
                <td>
                    <?php if (file_exists(__DIR__ . '/config.php')): ?>
                        <span class="success">✓ Exists</span> 
                        (Readable: <?= is_readable(__DIR__ . '/config.php') ? 'Yes' : 'No' ?>)
                    <?php else: ?>
                        <span class="error">✗ Not Found</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Portal Directory</th>
                <td>
                    <?php if (is_dir(__DIR__)): ?>
                        <span class="success">✓ Exists</span>
                        (Writable: <?= is_writable(__DIR__) ? 'Yes' : 'No' ?>)
                    <?php else: ?>
                        <span class="error">✗ Not Found</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="card">
        <h2>Session Test</h2>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['test'] = 'Session is working!';
        echo '<p class="success">✓ Session Started Successfully</p>';
        echo '<p>Session ID: <code>' . htmlspecialchars(session_id()) . '</code></p>';
        ?>
    </div>

    <div class="card">
        <h2>Next Steps</h2>
        <ul>
            <li>If all tests pass, try accessing <a href="index.php">index.php</a></li>
            <li>Check <a href="employees.php">employees.php</a> (requires login)</li>
            <li><strong>Note:</strong> <code>config.php</code> is a configuration file and should not be accessed directly. It will show "Access denied" if you try.</li>
        </ul>
    </div>

    <div class="card">
        <p><strong>Security Note:</strong> Delete this file (<code>info.php</code>) after testing for security reasons.</p>
    </div>
</body>
</html>

