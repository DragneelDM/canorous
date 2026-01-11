<?php
/**
 * Video Text Grid Component
 * Alternating video/text sections (simplified, no 3D pins)
 * 
 * @param array $items - Array of items with:
 *   - title (string)
 *   - description (string)
 *   - video (string, optional) - video path
 *   - image (string, optional) - image path (fallback if no video)
 */
$items = $items ?? [];

if (empty($items)) {
    return;
}
?>
<section class="bg-gray-900 py-12 sm:py-16 md:py-20 text-white">
    <div class="max-w-6xl mx-auto space-y-16 sm:space-y-20 md:space-y-24 px-4 sm:px-6 lg:px-8">
        <?php foreach ($items as $index => $item): ?>
            <?php
            $isReversed = $index % 2 === 1; // alternate layout
            $hasMedia = !empty($item['video']) || !empty($item['image']);
            ?>
            <div class="flex flex-col lg:flex-row items-center gap-8 sm:gap-10 md:gap-12 <?= $isReversed ? 'lg:flex-row-reverse' : '' ?>">
                <!-- Media: video or image -->
                <?php if ($hasMedia): ?>
                    <div class="flex-1 w-full">
                        <?php if (!empty($item['video'])): ?>
                            <div class="relative w-full aspect-video">
                                <video
                                    src="<?= h($item['video']) ?>"
                                    autoplay
                                    loop
                                    muted
                                    playsinline
                                    class="absolute inset-0 w-full h-full rounded-lg shadow-lg object-cover"
                                ></video>
                            </div>
                        <?php elseif (!empty($item['image'])): ?>
                            <div class="relative w-full aspect-video">
                                <img
                                    src="<?= h($item['image']) ?>"
                                    alt="<?= h($item['title'] ?? '') ?>"
                                    class="absolute inset-0 w-full h-full rounded-lg shadow-lg object-cover"
                                />
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Text -->
                <div class="flex-1">
                    <?php if (!empty($item['title'])): ?>
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4"><?= h($item['title']) ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($item['description'])): ?>
                        <p class="text-gray-300 text-base sm:text-lg md:text-xl leading-relaxed"><?= h($item['description']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
