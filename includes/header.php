<?php
// Get current page for active link highlighting
$current_path = $_SERVER['REQUEST_URI'] ?? '/';
$current_path = parse_url($current_path, PHP_URL_PATH);

// Default metadata if not set
$page_title = $page_title ?? 'Canorous | Engineering, Manufacturing, 3D Visualization, and Unreal Studio';
$page_description = $page_description ?? 'Canorous delivers end-to-end engineering, turnkey manufacturing, 3D visualization, and Unreal Studio VR/AR solutions for industries worldwide.';
$page_keywords = $page_keywords ?? 'MEP engineering, turnkey manufacturing, Unreal Engine, VR/AR, 3D visualization, product design, engineering solutions, Canorous';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($page_title) ?></title>
    <meta name="description" content="<?= h($page_description) ?>">
    <meta name="keywords" content="<?= h($page_keywords) ?>">
    
    <!-- Tailwind CSS via Play CDN (works with tracking prevention) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= asset('assets/css/custom.css') ?>">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="<?= h($page_title) ?>">
    <meta property="og:description" content="<?= h($page_description) ?>">
    <meta property="og:url" content="https://canorous.com<?= h($current_path) ?>">
    <meta property="og:site_name" content="Canorous">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
</head>
<body class="antialiased">
    <nav class="sticky top-0 z-50 bg-gray-900 bg-opacity-90 backdrop-blur-md shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="<?= asset('') ?>" class="flex items-center gap-2" aria-label="Canorous home">
                <img
                    src="<?= asset('public/images/Company-logo.png') ?>"
                    alt="Canorous"
                    class="h-10 w-auto object-contain"
                />
            </a>

            <!-- Desktop links -->
            <div class="hidden md:flex space-x-6">
                <?php
                $links = [
                    ['name' => 'Unreal Studio', 'href' => asset('unreal-studio.php')],
                    ['name' => '3D Studio', 'href' => asset('3d-studio.php')],
                    ['name' => 'Services', 'href' => asset('engineering.php')],
                    ['name' => 'Careers', 'href' => asset('contact.php')],
                    ['name' => 'Contact', 'href' => asset('contact.php')],
                ];
                foreach ($links as $link):
                    $isActive = ($current_path === $link['href'] || $current_path === str_replace('.php', '', $link['href']));
                ?>
                    <a
                        href="<?= h($link['href']) ?>"
                        class="text-white hover:text-blue-500 font-medium <?= $isActive ? 'text-blue-500' : '' ?>"
                    >
                        <?= h($link['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button
                    id="mobile-menu-button"
                    class="text-white focus:outline-none"
                    aria-label="Toggle menu"
                >
                    <span id="menu-icon">☰</span>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-900 px-4 pb-4 space-y-2">
            <?php foreach ($links as $link):
                $isActive = ($current_path === $link['href'] || $current_path === str_replace('.php', '', $link['href']));
            ?>
                <a
                    href="<?= h($link['href']) ?>"
                    class="block text-white hover:text-blue-500 font-medium <?= $isActive ? 'text-blue-500' : '' ?>"
                >
                    <?= h($link['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>
