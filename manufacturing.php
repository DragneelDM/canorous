<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Manufacturing & Global Trading | Canorous';
$page_description = 'Delivering fully assembled, tested products with global reach. Precision manufacturing and industrial component distribution.';
$page_keywords = 'manufacturing, industrial components, valves, actuators, gears, pumps, global trading, Canorous';

// Load manufacturing portfolio data
$manufacturingData = load_json_data('manufacturing.json');
?>

<main>
    <?php
    // Hero Component
    $headline = 'Canorous';
    $subbrands = ['Manufacturing'];
    $subtitle = 'Delivering fully assembled, tested products with global reach.';
    $ctaText = 'View Manufacturing Portfolio';
    $ctaLink = '#portfolio';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/Warehouse.mp4';
    $overlayColor = 'bg-gray-900/50';
    include __DIR__ . '/components/hero.php';
    ?>

    <?php
    // Clients Section Component
    $page = 'manufacturing';
    include __DIR__ . '/components/clients-section.php';
    ?>

    <!-- Portfolio -->
    <section id="portfolio" class="max-w-7xl mx-auto py-16 px-4">
        <h2 class="text-3xl font-bold text-white mb-8 text-center">
            Our Manufactured Products
        </h2>
        <?php
        $data = $manufacturingData;
        include __DIR__ . '/components/portfolio-grid.php';
        ?>
    </section>

    <!-- Global Trading -->
    <section class="max-w-7xl mx-auto py-16 px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Text -->
        <div>
            <h2 class="text-2xl font-bold text-white mb-4">Global Trading</h2>
            <p class="text-gray-300 mb-6">
                Beyond manufacturing, Canorous facilitates global trade and
                distribution of industrial components. Our network enables seamless
                delivery to clients across multiple regions.
            </p>
        </div>

        <!-- Globe Video -->
        <div class="flex justify-center">
            <video
                autoplay
                loop
                muted
                playsinline
                class="rounded-lg shadow-lg max-h-80 object-cover"
            >
                <source src="public/videos/globe.mp4" type="video/mp4" />
                <source src="public/videos/globe.webm" type="video/webm" />
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
