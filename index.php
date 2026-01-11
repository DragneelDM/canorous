<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Canorous | Engineering, Manufacturing, 3D Visualization, and Unreal Studio';
$page_description = 'Canorous delivers end-to-end engineering, turnkey manufacturing, 3D visualization, and Unreal Studio VR/AR solutions for industries worldwide.';
$page_keywords = 'MEP engineering, turnkey manufacturing, Unreal Engine, VR/AR, 3D visualization, product design, engineering solutions, Canorous';
?>

<main>
    <?php
    // Hero Component
    $headline = 'Canorous';
    $subbrands = ['Unreal Studio', '3D Studio', 'Engineering', 'Manufacturing'];
    $subtitle = 'Immersation and Innovation';
    $ctaText = 'Find your end to end solutions Today';
    $ctaLink = '#portfolio';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/CanorousPromo.mp4';
    $overlayColor = 'bg-gray-900/30';
    include __DIR__ . '/components/hero.php';
    ?>

    <?php
    // What Sets Us Apart Component
    include __DIR__ . '/components/what-sets-us-apart.php';
    ?>

    <?php
    // Clients Section Component
    $page = 'landing';
    include __DIR__ . '/components/clients-section.php';
    ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
