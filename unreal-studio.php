<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Unreal Studio | Canorous';
$page_description = 'Immersive, interactive experiences powered by Unreal Engine. VR walkthroughs, interactive configurators, and gaming applications.';
$page_keywords = 'Unreal Engine, VR, AR, virtual reality, interactive experiences, gaming, Canorous Unreal Studio';

$unrealItems = [
    [
        'title' => 'Virtual Reality Experiences',
        'description' => 'Step into your projects before they\'re built with immersive VR walkthroughs that give clients and stakeholders a true sense of scale and space.',
        'video' => 'public/videos/VR_Headset.mp4',
    ],
    [
        'title' => 'Interactive Configurators',
        'description' => 'Explore design options in real-time. Our configurators let users customize products, interiors, and environments seamlessly.',
        'video' => 'public/videos/Customize.mp4',
    ],
    [
        'title' => 'Gaming Applications',
        'description' => 'From interactive mechanics to visually striking worlds, our Unreal expertise extends to creating engaging gaming experiences.',
        'video' => 'public/videos/Gameplay.mp4',
    ],
];
?>

<main>
    <?php
    // Hero Component
    $headline = 'Canorous';
    $subbrands = ['Unreal Studio'];
    $subtitle = 'Immersive, interactive experiences powered by Unreal Engine.';
    $ctaText = 'Explore Projects';
    $ctaLink = '#portfolio';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/Gameplay.mp4';
    $overlayColor = 'bg-gray-900/50';
    include __DIR__ . '/components/hero.php';
    ?>

    <?php
    // Video Text Grid Component
    $items = $unrealItems;
    include __DIR__ . '/components/video-text-grid.php';
    ?>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
