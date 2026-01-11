<?php
/**
 * Clients Section Component
 * 
 * @param string $page - Page type: "landing" | "unreal" | "manufacturing" | "studio3d" | "engineering"
 * @param bool $showSectionTitle - Whether to show "Our Clients" title (default: true)
 */
require_once __DIR__ . '/../includes/config.php';

$page = $page ?? 'landing';
$showSectionTitle = $showSectionTitle ?? true;

// Load clients data
$clientsData = load_json_data('ClientsData.json');
$filteredClients = [];

if ($page === 'landing') {
    $filteredClients = array_filter($clientsData['clients'] ?? [], function($c) {
        return !empty($c['showOnLanding']);
    });
} elseif ($page === 'unreal') {
    $filteredClients = array_filter($clientsData['clients'] ?? [], function($c) {
        return isset($c['type']) && $c['type'] === 'unrealstudio';
    });
} elseif ($page === 'manufacturing') {
    $filteredClients = array_filter($clientsData['clients'] ?? [], function($c) {
        return isset($c['type']) && $c['type'] === 'manufacturing';
    });
} elseif ($page === 'engineering') {
    $filteredClients = array_filter($clientsData['clients'] ?? [], function($c) {
        return isset($c['type']) && $c['type'] === 'engineering';
    });
} elseif ($page === 'studio3d') {
    $filteredClients = array_filter($clientsData['clients'] ?? [], function($c) {
        return isset($c['type']) && $c['type'] === 'studio3d';
    });
}

$filteredClients = array_values($filteredClients); // Re-index array

if (empty($filteredClients)) {
    return;
}
?>
<section class="py-12 sm:py-16 md:py-20 bg-gray-900 text-white text-center">
    <?php if ($showSectionTitle): ?>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-8 sm:mb-12 px-4">Our Clients</h2>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
            <?php foreach ($filteredClients as $client): ?>
                <div class="aspect-[3/2] flex items-center justify-center bg-gray-800 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-750 transition-all p-4">
                    <img src="<?= asset($client['logo']) ?>" alt="<?= h($client['name']) ?>" class="max-h-12 sm:max-h-14 md:max-h-16 w-auto object-contain" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
