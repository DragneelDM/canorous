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
<section class="bg-gray-900 py-20 text-white">
    <div class="max-w-6xl mx-auto space-y-24 px-6">
        <?php foreach ($items as $index => $item): ?>
            <?php
            $isReversed = $index % 2 === 1; // alternate layout
            $hasMedia = !empty($item['video']) || !empty($item['image']);
            ?>
            <div class="flex flex-col lg:flex-row items-center gap-12 <?= $isReversed ? 'lg:flex-row-reverse' : '' ?>">
                <!-- Media: video or image -->
                <?php if ($hasMedia): ?>
                    <div class="flex-1 w-full">
                        <?php if (!empty($item['video'])): ?>
                            <video
                                src="<?= h($item['video']) ?>"
                                autoplay
                                loop
                                muted
                                playsinline
                                class="w-full rounded-lg shadow-lg"
                            ></video>
                        <?php elseif (!empty($item['image'])): ?>
                            <img
                                src="<?= h($item['image']) ?>"
                                alt="<?= h($item['title'] ?? '') ?>"
                                class="w-full rounded-lg shadow-lg"
                            />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Text -->
                <div class="flex-1">
                    <?php if (!empty($item['title'])): ?>
                        <h3 class="text-3xl font-bold mb-4"><?= h($item['title']) ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($item['description'])): ?>
                        <p class="text-gray-300 text-lg"><?= h($item['description']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
