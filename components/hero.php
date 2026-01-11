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
    <div class="relative z-20 text-center px-4 max-w-6xl mx-auto">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">
            <?= h($headline) ?>
        </h1>

        <?php if (!empty($subbrands)): ?>
            <div class="flex flex-wrap justify-center gap-3 md:gap-4 mb-6">
                <?php foreach ($subbrands as $subbrand): ?>
                    <span class="px-4 py-2 text-white text-sm md:text-base font-semibold rounded-full border-2 border-blue-400 hover:border-red-400 transition-colors">
                        <?= h($subbrand) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($subtitle): ?>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto"><?= h($subtitle) ?></p>
        <?php endif; ?>

        <a
            href="<?= h($ctaLink) ?>"
            class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-red-600 hover:from-blue-700 hover:to-red-700 text-white font-bold rounded-lg transition-all shadow-lg hover:scale-105 transform"
        >
            <?= h($ctaText) ?>
        </a>
    </div>
</section>
