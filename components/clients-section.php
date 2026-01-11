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
<section class="py-16 bg-gray-900 text-white text-center">
    <?php if ($showSectionTitle): ?>
        <h2 class="text-2xl font-bold mb-12">Our Clients</h2>
    <?php endif; ?>

    <div class="flex flex-wrap justify-center gap-6">
        <?php foreach ($filteredClients as $client): ?>
            <div class="w-32 h-20 flex items-center justify-center bg-gray-800 rounded shadow">
                <img src="<?= asset($client['logo']) ?>" alt="<?= h($client['name']) ?>" class="max-h-12 object-contain" />
            </div>
        <?php endforeach; ?>
    </div>
</section>
