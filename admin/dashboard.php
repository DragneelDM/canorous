<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/config.php';

// Require authentication
require_admin_auth();

// Handle search and pagination
$search = trim($_GET['search'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1));
$per_page = 20;
$offset = ($page - 1) * $per_page;

// Get employees from database
try {
    $mysqli = get_db_connection();

    // Count total employees
    $count_sql = "SELECT COUNT(*) as total FROM employees";
    $where_clause = '';
    if ($search) {
        $where_clause = " WHERE name LIKE ? OR employee_id LIKE ? OR email LIKE ?";
        $count_sql .= $where_clause;
    }

    $count_stmt = $mysqli->prepare($count_sql);
    if ($search) {
        $search_param = "%$search%";
        $count_stmt->bind_param('sss', $search_param, $search_param, $search_param);
    }
    $count_stmt->execute();
    $total = $count_stmt->get_result()->fetch_assoc()['total'];
    $count_stmt->close();

    // Get employees with pagination
    $sql = "SELECT employee_id, name, designation, department, status, email, phone,
                   token, token_created_at, token_expires_at
            FROM employees" . $where_clause . "
            ORDER BY name ASC
            LIMIT ? OFFSET ?";

    $stmt = $mysqli->prepare($sql);
    if ($search) {
        $stmt->bind_param('ssii', $search_param, $search_param, $search_param, $per_page, $offset);
    } else {
        $stmt->bind_param('ii', $per_page, $offset);
    }
    $stmt->execute();
    $employees = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $mysqli->close();

    $total_pages = ceil($total / $per_page);
} catch (Exception $e) {
    $error = 'Database error: ' . $e->getMessage();
    $employees = [];
    $total = 0;
    $total_pages = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Canorous</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <!-- Navigation -->
    <nav class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-white">Canorous Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400 text-sm">
                        <?= h(get_admin_username()) ?>
                    </span>
                    <a href="/admin/logout.php" class="text-sm text-red-400 hover:text-red-300">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="px-4 py-6 sm:px-0">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">Employee Management</h2>
                    <p class="text-gray-400 mt-1">Manage employee verification tokens and information</p>
                </div>
                <a
                    href="/admin/employee-form.php"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors"
                >
                    + Add Employee
                </a>
            </div>

            <!-- Search -->
            <div class="mb-6">
                <form method="GET" action="" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="<?= h($search) ?>"
                        placeholder="Search by name, ID, or email..."
                        class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button
                        type="submit"
                        class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors"
                    >
                        Search
                    </button>
                    <?php if ($search): ?>
                        <a
                            href="/admin/dashboard.php"
                            class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors"
                        >
                            Clear
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Employee Table -->
            <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Employee
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Designation
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Token Expires
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php if (empty($employees)): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                        <?= $search ? 'No employees found matching your search.' : 'No employees yet. Click "Add Employee" to get started.' ?>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($employees as $emp): ?>
                                    <tr class="hover:bg-gray-750">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-white"><?= h($emp['name']) ?></div>
                                                <div class="text-sm text-gray-400"><?= h($emp['employee_id']) ?></div>
                                                <div class="text-xs text-gray-500"><?= h($emp['email'] ?: '—') ?></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white"><?= h($emp['designation'] ?: '—') ?></div>
                                            <div class="text-xs text-gray-400"><?= h($emp['department'] ?: '—') ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                            $status = strtolower($emp['status'] ?? 'inactive');
                                            $status_class = $status === 'active'
                                                ? 'bg-green-900/50 text-green-200 border-green-700'
                                                : 'bg-red-900/50 text-red-200 border-red-700';
                                            ?>
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full border <?= $status_class ?>">
                                                <?= ucfirst($status) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                            <?php
                                            if ($emp['token_expires_at']) {
                                                $expires = strtotime($emp['token_expires_at']);
                                                $is_expired = $expires < time();
                                                $color = $is_expired ? 'text-red-400' : 'text-gray-400';
                                                echo '<span class="' . $color . '">' . date('M j, Y', $expires) . '</span>';
                                            } else {
                                                echo '—';
                                            }
                                            ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="/admin/employee-form.php?id=<?= h($emp['employee_id']) ?>" class="text-blue-400 hover:text-blue-300">Edit</a>
                                            <a href="/admin/send-token.php?id=<?= h($emp['employee_id']) ?>" class="text-green-400 hover:text-green-300">Send Token</a>
                                            <a href="/verify.php?t=<?= h($emp['token']) ?>" class="text-gray-400 hover:text-gray-300" target="_blank">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                    <div class="bg-gray-900 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1 ?><?= $search ? '&search=' . urlencode($search) : '' ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-gray-300 bg-gray-800 hover:bg-gray-700">
                                    Previous
                                </a>
                            <?php endif; ?>
                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?= $page + 1 ?><?= $search ? '&search=' . urlencode($search) : '' ?>" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-gray-300 bg-gray-800 hover:bg-gray-700">
                                    Next
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-400">
                                    Showing <span class="font-medium"><?= $offset + 1 ?></span> to <span class="font-medium"><?= min($offset + $per_page, $total) ?></span> of <span class="font-medium"><?= $total ?></span> employees
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i === $page): ?>
                                            <span class="relative inline-flex items-center px-4 py-2 border border-blue-600 bg-blue-600 text-sm font-medium text-white">
                                                <?= $i ?>
                                            </span>
                                        <?php else: ?>
                                            <a href="?page=<?= $i ?><?= $search ? '&search=' . urlencode($search) : '' ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-300 hover:bg-gray-700">
                                                <?= $i ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
