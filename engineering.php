<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Engineering & Technology Services | Canorous';
$page_description = 'Scalable engineering teams for plant, product, and performance engineering—backed by deep domain expertise and digital toolchains.';
$page_keywords = 'engineering services, mechanical design, process engineering, structural engineering, CFD analysis, FEA analysis, product development';

// Load engineering portfolio data
$engineeringData = load_json_data('engineering.json');

$serviceSections = [
    [
        'title' => 'Digital Plant / Product Engineering',
        'blurb' => 'Integrated engineering support tying mechanical, process, and structural disciplines together for connected plants.',
        'items' => [
            'Mechanical Design & Engineering',
            'Process & Piping',
            'Civil & Structural',
        ],
        'image' => 'public/images/digital-plant.jpg',
    ],
    [
        'title' => 'Product Support',
        'blurb' => 'Lifecycle teams that shepherd products from concept to aftermarket success with rapid feedback loops.',
        'items' => [
            'New Product Development',
            'After Market Engineering',
            'Sustenance Engineering',
        ],
        'image' => 'public/images/product-support.jpg',
    ],
    [
        'title' => 'Simulation & Analysis',
        'blurb' => 'Virtual validation to de-risk builds using multi-physics simulations, optimization, and performance studies.',
        'items' => ['CFD Analysis', 'FEA Analysis'],
        'image' => 'public/images/simulation-analysis.jpg',
    ],
];
?>

<main class="bg-gray-950 text-white">
    <!-- Services -->
    <section class="relative isolate overflow-hidden py-24">
        <img 
            src="public/images/engineering-hero.webp" 
            alt="" 
            class="absolute inset-0 -z-20 w-full h-full object-cover"
        />
        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-gray-950/95 via-gray-950/90 to-gray-950/98"></div>

        <div class="relative max-w-7xl mx-auto px-4">
            <div class="mx-auto mb-16 max-w-3xl text-center text-white">
                <p class="uppercase tracking-[0.3em] text-sm text-orange-300">What We Deliver</p>
                <h2 class="mt-4 text-4xl font-bold">Engineering & Technology Services</h2>
                <p class="mt-4 text-lg text-gray-200">
                    Scalable teams that own every stage of plant, product, and performance engineering—backed
                    by deep domain expertise and digital toolchains.
                </p>
            </div>

            <div class="space-y-12">
                <?php foreach ($serviceSections as $section): ?>
                    <article class="grid gap-10 rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/40 backdrop-blur-2xl md:grid-cols-2 md:p-12">
                        <div class="flex flex-col justify-center text-white">
                            <h3 class="mt-4 text-3xl font-bold"><?= h($section['title']) ?></h3>
                            <p class="mt-4 text-gray-200"><?= h($section['blurb']) ?></p>
                            <?php if (!empty($section['items'])): ?>
                                <ul class="mt-6 space-y-3">
                                    <?php foreach ($section['items'] as $item): ?>
                                        <li class="flex items-center gap-3 text-lg text-gray-100">
                                            <span class="text-2xl text-orange-300">•</span>
                                            <span><?= h($item) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <div class="relative h-72 overflow-hidden rounded-2xl border border-white/20 bg-black/30 md:h-full">
                            <img
                                src="<?= h($section['image']) ?>"
                                alt="<?= h($section['title']) ?>"
                                class="w-full h-full object-cover object-center"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/10"></div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <?php
    $page = 'engineering';
    include __DIR__ . '/components/clients-section.php';
    ?>

    <!-- Portfolio -->
    <section
        id="portfolio"
        class="max-w-7xl mx-auto py-16 px-4 bg-gray-900/60 border-t border-gray-800"
    >
        <h2 class="text-3xl font-bold text-white mb-8 text-center">
            Manufacturing Portfolio
        </h2>
        <?php
        $data = $engineeringData;
        $slidesPerView = 3;
        $showModal = true;
        $autoplay = true;
        include __DIR__ . '/components/portfolio-slider.php';
        ?>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
