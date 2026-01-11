<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Engineering & Manufacturing | FEA Simulation & Precision Manufacturing | Canorous';
$page_description = 'Complete design-to-manufacturing services: CAD engineering, FEA simulation, and precision manufacturing—all in one integrated workflow. ISO 9001:2015 certified.';
$page_keywords = 'engineering manufacturing, FEA simulation, CFD analysis, mechanical design, precision manufacturing, product validation, Canorous';

// Load engineering and manufacturing portfolio data
$engineeringData = load_json_data('engineering.json');
$manufacturingData = load_json_data('manufacturing.json');

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
    [
        'title' => 'Precision Manufacturing',
        'blurb' => 'Turnkey manufacturing with ISO 9001:2015 certification. From engineered designs to finished components—valves, gears, hydraulic cylinders, and industrial assemblies.',
        'items' => [
            'Precision Valves & Actuators',
            'Custom Gears & Bearings',
            'Hydraulic Cylinders',
            'Industrial Fasteners & Assemblies',
            'Global Supply Chain Management'
        ],
        'image' => 'public/images/bracket.jpg', // Using existing manufacturing image
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
                <p class="uppercase tracking-[0.3em] text-sm text-red-300">Engineering + Manufacturing + Visualization</p>
                <h2 class="mt-4 text-4xl font-bold">Engineering & Manufacturing Services</h2>
                <p class="mt-4 text-lg text-gray-200">
                    Complete design-to-manufacturing services: CAD engineering, FEA validation, precision manufacturing, and VR deployment—all in one integrated workflow. ISO 9001:2015 certified.
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
                                            <span class="text-2xl text-red-300">•</span>
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

    <!-- Engineering Portfolio -->
    <section
        id="portfolio"
        class="max-w-7xl mx-auto py-16 px-4 bg-gray-900/60 border-t border-gray-800"
    >
        <h2 class="text-3xl font-bold text-white mb-8 text-center">
            Engineering Portfolio
        </h2>
        <?php
        $data = $engineeringData;
        $slidesPerView = 3;
        $showModal = true;
        $autoplay = true;
        include __DIR__ . '/components/portfolio-slider.php';
        ?>
    </section>

    <!-- Manufacturing Portfolio -->
    <section class="max-w-7xl mx-auto py-16 px-4 bg-gray-900/40 border-t border-gray-800">
        <h2 class="text-3xl font-bold text-white mb-8 text-center">
            Manufacturing Portfolio
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($manufacturingData as $item): ?>
                <article class="group bg-gray-800/50 rounded-xl overflow-hidden border border-gray-700 hover:border-red-500 transition-all">
                    <div class="relative h-48 overflow-hidden bg-gray-900">
                        <img
                            src="<?= asset($item['image']) ?>"
                            alt="<?= h($item['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        />
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-blue-400 transition-colors">
                            <?= h($item['title']) ?>
                        </h3>
                        <p class="text-gray-300 text-sm">
                            <?= h($item['description']) ?>
                        </p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Integration CTA -->
    <section class="py-16 bg-gradient-to-b from-gray-900 to-gray-950 border-t border-gray-800">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Engineering Is Just the Starting Point
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                Most engineering firms stop at CAD files. We keep going—running FEA simulations to validate performance, creating photorealistic 3D models, and deploying your product in VR for client demos.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a
                    href="<?= asset('unreal-studio.php') ?>"
                    class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    See Our VR/AR Capabilities →
                </a>
                <a
                    href="<?= asset('portfolio.php') ?>"
                    class="px-8 py-4 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-all border border-gray-700"
                >
                    View Full Portfolio
                </a>
            </div>
        </div>
    </section>
</main>

<!-- SEO: Structured Data (JSON-LD) for Engineering Services -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Engineering & Manufacturing Services",
  "provider": {
    "@type": "Organization",
    "name": "Canorous Technologies",
    "url": "<?= BASE_URL ?>"
  },
  "areaServed": "Worldwide",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Engineering Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Digital Plant / Product Engineering",
          "description": "Integrated engineering support tying mechanical, process, and structural disciplines together for connected plants",
          "offers": {
            "@type": "Offer",
            "availability": "https://schema.org/InStock"
          }
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Product Support",
          "description": "Lifecycle teams that shepherd products from concept to aftermarket success with rapid feedback loops"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "FEA & CFD Simulation",
          "description": "Virtual validation to de-risk builds using multi-physics simulations, optimization, and performance studies",
          "additionalType": "https://en.wikipedia.org/wiki/Finite_element_analysis"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Precision Manufacturing",
          "description": "ISO 9001:2015 certified turnkey manufacturing solutions for valves, gears, hydraulic cylinders, and industrial assemblies"
        }
      }
    ]
  },
  "certification": {
    "@type": "Certification",
    "name": "ISO 9001:2015",
    "issuedBy": {
      "@type": "Organization",
      "name": "ISO"
    }
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
