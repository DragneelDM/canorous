<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = '3D Studio | Canorous';
$page_description = 'Crafting 3D environments and assets for visualization and interactive experiences.';
$page_keywords = '3D visualization, 3D modeling, architectural visualization, 3D assets, Canorous 3D Studio';
?>

<main>
    <?php
    // Hero Component
    $headline = 'Canorous';
    $subbrands = ['3D Studio'];
    $subtitle = 'Crafting 3D environments and assets for visualization and interactive experiences.';
    $ctaText = 'See 3D Studio Work';
    $ctaLink = '#portfolio';
    $backgroundType = 'video';
    $backgroundVideo = '/videos/Outdoor-Clip.mp4';
    $overlayColor = 'bg-gray-800/60';
    include __DIR__ . '/components/hero.php';
    ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
