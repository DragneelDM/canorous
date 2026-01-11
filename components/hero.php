<?php
/**
 * Hero Component
 * 
 * @param string $headline - Main headline text
 * @param array $subbrands - Array of subbrands to display (optional, no typewriter effect)
 * @param string $subtitle - Subtitle text
 * @param string $ctaText - Call-to-action button text
 * @param string $ctaLink - Call-to-action button link
 * @param bool $showBackground - Whether to show background (default: true)
 * @param string $backgroundType - "gradient" | "video" | "image"
 * @param string $backgroundVideo - Video path if using video background
 * @param string $backgroundImage - Image path if using image background
 * @param string $overlayColor - Tailwind overlay color class (default: "bg-gray-900/70")
 */
$headline = $headline ?? 'Canorous';
$subbrands = $subbrands ?? [];
$subtitle = $subtitle ?? '';
$ctaText = $ctaText ?? 'Explore Our Work';
$ctaLink = $ctaLink ?? '#portfolio';
$showBackground = $showBackground ?? true;
$backgroundType = $backgroundType ?? 'gradient';
$backgroundVideo = $backgroundVideo ?? '';
$backgroundImage = $backgroundImage ?? '';
$overlayColor = $overlayColor ?? 'bg-gray-900/70';
?>
<section class="relative w-full h-screen flex items-center justify-center overflow-hidden">
    <!-- Background -->
    <?php if ($showBackground && $backgroundType === 'gradient'): ?>
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 <?= h($overlayColor) ?>"></div>
    <?php endif; ?>

    <?php if ($showBackground && $backgroundType === 'image' && $backgroundImage): ?>
        <img src="<?= asset($backgroundImage) ?>" alt="Background" class="absolute inset-0 w-full h-full object-cover" />
    <?php endif; ?>

    <?php if ($showBackground && $backgroundType === 'video' && $backgroundVideo): ?>
        <video
            autoplay
            muted
            loop
            playsinline
            class="absolute inset-0 w-full h-full object-cover"
        >
            <source src="<?= asset($backgroundVideo) ?>" type="video/mp4" />
        </video>
    <?php endif; ?>

    <?php if ($showBackground): ?>
        <div class="absolute inset-0 <?= h($overlayColor) ?>"></div>
    <?php endif; ?>

    <!-- Hero Content -->
    <div class="relative z-20 text-center px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-4">
            <?= h($headline) ?>
            <?php if (!empty($subbrands)): ?>
                <span class="text-blue-400">
                    <?= h(implode(' | ', $subbrands)) ?>
                </span>
            <?php endif; ?>
        </h1>

        <?php if ($subtitle): ?>
            <p class="text-lg md:text-2xl text-gray-300 mb-8"><?= h($subtitle) ?></p>
        <?php endif; ?>

        <a
            href="<?= h($ctaLink) ?>"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition"
        >
            <?= h($ctaText) ?>
        </a>
    </div>
</section>
