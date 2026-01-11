<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Unreal Studio & 3D Pipeline | Blender, Substance, Unreal Engine | Canorous';
$page_description = 'Complete 3D to VR pipeline: Blender modeling, Substance texturing, Unreal/Unity development, pixel streaming. Architectural visualization, VR/AR product demos, custom applications—all in-house.';
$page_keywords = 'Blender 3D modeling, Substance Painter, Unreal Engine, Unity, pixel streaming, VR, AR, architectural visualization, 3D pipeline, Canorous';

$unrealItems = [
    [
        'title' => 'Architectural Visualization with Pixel Streaming',
        'description' => 'Walk through your building in photorealistic quality—from any browser, no downloads or VR headset required. Perfect for real estate, architecture firms, and construction projects.',
        'video' => 'public/videos/VR_Headset.mp4',
    ],
    [
        'title' => 'VR/AR Product Demos & Configurators',
        'description' => 'Let clients interact with your product in VR or AR before manufacturing. Change colors, materials, and features in real-time. Close deals with immersive sales experiences.',
        'video' => 'public/videos/Customize.mp4',
    ],
    [
        'title' => 'Custom Unreal/Unity Applications',
        'description' => 'From training simulators to digital twins to interactive games—we build custom Unreal and Unity applications with full-stack backends and cloud deployment.',
        'video' => 'public/videos/Gameplay.mp4',
    ],
];
?>

<main>
    <?php
    // Hero Component
    $headline = 'Unreal Studio & 3D Pipeline';
    $subbrands = ['3D Asset Creation: Blender & Substance', 'Unreal Engine & Unity Development', 'VR/AR Experiences', 'Architectural Visualization', 'Pixel Streaming', 'Full-Stack Integration'];
    $subtitle = 'From 3D asset creation to cloud deployment—we deliver complete Unreal Engine solutions that run anywhere.';
    $ctaText = 'See Our Capabilities';
    $ctaLink = '#pipeline';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/Gameplay.mp4';
    $overlayColor = 'bg-gray-900/50';
    include __DIR__ . '/components/hero.php';
    ?>

    <!-- Complete Pipeline Section -->
    <section id="pipeline" class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    The Complete 3D to VR Pipeline—All In-House
                </h2>
                <p class="text-xl text-gray-300 max-w-4xl mx-auto">
                    Most studios outsource 3D asset creation or only do visualization. We control the entire workflow from high-poly sculpting to browser-based deployment.
                </p>
            </div>

            <!-- Pipeline Visual Diagram -->
            <div class="mb-16">
                <div class="grid md:grid-cols-5 gap-4 items-center">
                    <div class="bg-gray-800 rounded-xl p-6 border-2 border-red-500 transform hover:scale-105 transition-transform">
                        <h3 class="font-bold text-blue-400 text-lg mb-2">1. Blender Modeling</h3>
                        <p class="text-gray-300 text-sm">High-poly sculpting, hard-surface, organic, architectural</p>
                    </div>
                    <div class="flex items-center justify-center md:block hidden">
                        <span class="text-4xl text-blue-400 font-bold">→</span>
                    </div>
                    <div class="bg-gray-800 rounded-xl p-6 border-2 border-red-500 transform hover:scale-105 transition-transform">
                        <h3 class="font-bold text-blue-400 text-lg mb-2">2. Substance Texturing</h3>
                        <p class="text-gray-300 text-sm">PBR materials, photorealistic surfaces</p>
                    </div>
                    <div class="flex items-center justify-center md:block hidden">
                        <span class="text-4xl text-blue-400 font-bold">→</span>
                    </div>
                    <div class="bg-gray-800 rounded-xl p-6 border-2 border-red-500 transform hover:scale-105 transition-transform">
                        <h3 class="font-bold text-blue-400 text-lg mb-2">3. Unreal/Unity</h3>
                        <p class="text-gray-300 text-sm">Real-time rendering, VR/AR deployment</p>
                    </div>
                </div>
            </div>

            <!-- 3D Asset Creation Capabilities -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-gray-800/50 rounded-xl p-8 border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-4">3D Modeling</h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Hard-surface modeling (products, machinery)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Organic sculpting (characters, environments)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Architectural modeling</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>CAD data integration</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Game-ready optimization</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-800/50 rounded-xl p-8 border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-4">Texturing & Materials</h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>PBR material creation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Substance Painter workflows</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Photogrammetry processing</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Custom shader development</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Material libraries</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-800/50 rounded-xl p-8 border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-4">Integration</h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Engineering CAD to 3D pipeline</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>FEA results visualization</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Unity & Unreal Engine export</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Multi-platform optimization</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            <span>Version control & asset management</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Key Differentiators -->
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/70 rounded-xl p-6 border border-gray-700">
                    <h3 class="text-2xl font-bold text-blue-400 mb-3">In-House 3D Assets</h3>
                    <p class="text-gray-300">
                        We model and texture everything in Blender + Substance—no waiting on external vendors, no miscommunication.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/70 rounded-xl p-6 border border-gray-700">
                    <h3 class="text-2xl font-bold text-blue-400 mb-3">Pixel Streaming Expertise</h3>
                    <p class="text-gray-300">
                        Deploy photorealistic experiences to any browser—no downloads, no VR headset, no powerful PC required.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-gray-800/70 to-gray-900/70 rounded-xl p-6 border border-gray-700">
                    <h3 class="text-2xl font-bold text-blue-400 mb-3">Full-Stack Integration</h3>
                    <p class="text-gray-300">
                        Need user accounts, databases, or custom dashboards? We build the backend infrastructure, not just the 3D frontend.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Video Text Grid Component
    $items = $unrealItems;
    include __DIR__ . '/components/video-text-grid.php';
    ?>

    <!-- Portfolio Section -->
    <section class="py-20 bg-gray-950">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-blue-400 uppercase tracking-[0.3em] text-sm font-semibold mb-3">
                    Our Work
                </p>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    3D & Unreal Studio Portfolio
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    From photorealistic 3D assets to fully interactive VR experiences—explore our complete pipeline in action.
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button
                    class="portfolio-filter-local px-6 py-3 bg-red-600 text-white rounded-lg font-semibold transition-all hover:bg-red-700 active"
                    data-filter="all"
                >
                    All Projects
                </button>
                <button
                    class="portfolio-filter-local px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold transition-all hover:bg-gray-700"
                    data-filter="Archviz"
                >
                    Architectural Visualization
                </button>
                <button
                    class="portfolio-filter-local px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold transition-all hover:bg-gray-700"
                    data-filter="VR/AR"
                >
                    VR/AR
                </button>
                <button
                    class="portfolio-filter-local px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold transition-all hover:bg-gray-700"
                    data-filter="3D Assets"
                >
                    3D Assets
                </button>
                <button
                    class="portfolio-filter-local px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold transition-all hover:bg-gray-700"
                    data-filter="Games"
                >
                    Games & Interactive
                </button>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="unreal-portfolio-container">
                <?php
                $unrealPortfolio = load_json_data('unreal-studio.json');

                if (empty($unrealPortfolio)): ?>
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-400 text-lg">Portfolio projects coming soon...</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($unrealPortfolio as $project): ?>
                        <article
                            class="portfolio-item-local group bg-gray-800/50 rounded-xl overflow-hidden border border-gray-700 hover:border-red-500 transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/20"
                            data-category="<?= h($project['category']) ?>"
                        >
                            <!-- Project Image -->
                            <div class="relative h-64 overflow-hidden bg-gray-900">
                                <img
                                    src="<?= asset($project['image']) ?>"
                                    alt="<?= h($project['title']) ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>

                                <!-- Category Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-red-600/90 text-white rounded-full text-xs font-semibold backdrop-blur-sm">
                                        <?= h($project['category']) ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Project Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors">
                                    <?= h($project['title']) ?>
                                </h3>
                                <p class="text-gray-300 text-sm mb-4">
                                    <?= h($project['description']) ?>
                                </p>

                                <!-- Tags -->
                                <?php if (isset($project['tags']) && !empty($project['tags'])): ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach ($project['tags'] as $tag): ?>
                                            <span class="text-xs px-2 py-1 bg-gray-700 text-gray-300 rounded">
                                                <?= h($tag) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- No Results Message (hidden by default) -->
            <div id="no-results-local" class="hidden text-center py-12">
                <p class="text-gray-400 text-lg">No projects found in this category.</p>
            </div>

            <!-- CTA to Full Portfolio -->
            <div class="text-center mt-12">
                <a
                    href="<?= asset('portfolio.php') ?>"
                    class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    View Full Portfolio (All Domains) →
                </a>
            </div>
        </div>
    </section>

    <!-- Integration CTA -->
    <section class="py-16 bg-gradient-to-b from-gray-900 to-gray-950 border-t border-gray-800">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Need Engineering + VR in One Package?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                We're one of the few studios that can run FEA simulations on your product, then deploy it in VR for client demos—all in one pipeline.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a
                    href="<?= asset('engineering.php') ?>"
                    class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    Explore Engineering Services →
                </a>
                <a
                    href="<?= asset('contact.php') ?>"
                    class="px-8 py-4 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-all border border-gray-700"
                >
                    Schedule a Demo
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Portfolio Filter JavaScript for Unreal Studio Page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.portfolio-filter-local');
    const portfolioItems = document.querySelectorAll('.portfolio-item-local');
    const noResults = document.getElementById('no-results-local');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-red-600');
                btn.classList.add('bg-gray-800');
            });
            button.classList.add('active', 'bg-red-600');
            button.classList.remove('bg-gray-800');

            // Filter items with fade animation
            let visibleCount = 0;
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    item.style.opacity = '0';
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.transition = 'opacity 0.3s ease-in-out';
                        item.style.opacity = '1';
                    }, 10);
                    visibleCount++;
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });
});
</script>

<!-- SEO: Structured Data (JSON-LD) for Unreal Studio Services -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "3D Visualization & VR/AR Development",
  "provider": {
    "@type": "Organization",
    "name": "Canorous Technologies",
    "url": "<?= BASE_URL ?>"
  },
  "areaServed": "Worldwide",
  "description": "Complete 3D pipeline from Blender modeling to Substance texturing to Unreal Engine/Unity deployment with VR/AR capabilities and pixel streaming",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Unreal Studio & 3D Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "3D Asset Creation",
          "description": "High-poly sculpting, hard-surface modeling, PBR texturing with Blender and Substance Painter"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Architectural Visualization",
          "description": "Photorealistic architectural rendering and interactive walkthroughs with pixel streaming deployment"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "VR/AR Product Configurators",
          "description": "Interactive VR/AR experiences for product customization and client demonstrations"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Custom Unreal/Unity Applications",
          "description": "Game development, digital twins, training simulators, and custom interactive experiences"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Pixel Streaming & Cloud Deployment",
          "description": "Browser-based VR experiences without downloads or powerful hardware requirements"
        }
      }
    ]
  },
  "additionalType": [
    "https://en.wikipedia.org/wiki/Virtual_reality",
    "https://en.wikipedia.org/wiki/Augmented_reality",
    "https://en.wikipedia.org/wiki/3D_computer_graphics"
  ]
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
