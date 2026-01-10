<?php
/**
 * Portfolio Grid Component
 * Simple responsive grid layout (no JavaScript)
 * 
 * @param array $data - Array of portfolio items with 'image', 'title' (optional), 'description' (optional)
 */
$data = $data ?? [];

if (empty($data)) {
    return;
}
?>
<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php foreach ($data as $item): ?>
        <div class="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
            <div class="w-full aspect-[4/3] overflow-hidden">
                <img
                    src="<?= h($item['image']) ?>"
                    alt="<?= h($item['title'] ?? '') ?>"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                />
            </div>
            <?php if (!empty($item['title']) || !empty($item['description'])): ?>
                <div class="p-4">
                    <?php if (!empty($item['title'])): ?>
                        <h3 class="text-white font-semibold mb-2"><?= h($item['title']) ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($item['description'])): ?>
                        <p class="text-gray-300 text-sm"><?= h($item['description']) ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
