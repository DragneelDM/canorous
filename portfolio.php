<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Portfolio | Canorous';
$page_description = 'Explore our portfolio of engineering, manufacturing, 3D visualization, and Unreal Studio projects. From FEA simulations to VR experiences—see our integrated capabilities in action.';
$page_keywords = 'engineering portfolio, FEA projects, 3D visualization portfolio, Unreal Engine projects, VR/AR portfolio, Canorous';

// Load portfolio data from all domains
$engineeringData = load_json_data('engineering.json');
$manufacturingData = load_json_data('manufacturing.json');
$unrealData = load_json_data('unreal-studio.json');

// Combine and tag with category
$allProjects = array_merge(
    array_map(fn($p) => array_merge($p, ['category' => 'engineering', 'categoryLabel' => 'Engineering & FEA']), $engineeringData),
    array_map(fn($p) => array_merge($p, ['category' => 'manufacturing', 'categoryLabel' => 'Manufacturing']), $manufacturingData),
    array_map(fn($p) => array_merge($p, ['category' => 'unreal', 'categoryLabel' => '3D & Unreal Studio']), $unrealData)
);
?>

<main class="bg-gray-950 text-white min-h-screen">
    <?php
    // Hero Component
    $headline = 'Our Portfolio';
    $subbrands = ['Engineering & FEA', 'Manufacturing', '3D & Unreal Studio', 'Complete Pipeline Solutions'];
    $subtitle = 'Engineering validation, 3D visualization, and VR experiences—delivered as one integrated solution.';
    $ctaText = 'View All Projects';
    $ctaLink = '#portfolio-grid';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/CanorousPromo.mp4';
    $overlayColor = 'bg-gray-900/70';
    include __DIR__ . '/components/hero.php';
    ?>

    <!-- Portfolio Section -->
    <section id="portfolio-grid" class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <p class="text-blue-400 uppercase tracking-[0.2em] sm:tracking-[0.3em] text-xs sm:text-sm font-semibold mb-2 sm:mb-3">
                    Integrated Capabilities
                </p>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4">
                    Our Work Across All Domains
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto px-4">
                    From FEA simulations to precision manufacturing to immersive VR—explore projects that showcase our complete engineering-to-visualization pipeline.
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-3 sm:gap-4 mb-8 sm:mb-10 md:mb-12 px-4">
                <button
                    class="portfolio-filter px-4 py-2 sm:px-6 sm:py-3 bg-red-600 text-white rounded-lg text-sm sm:text-base font-semibold transition-all hover:bg-red-700 active"
                    data-filter="all"
                >
                    All Projects
                </button>
                <button
                    class="portfolio-filter px-4 py-2 sm:px-6 sm:py-3 bg-gray-800 text-white rounded-lg text-sm sm:text-base font-semibold transition-all hover:bg-gray-700"
                    data-filter="engineering"
                >
                    <span class="hidden sm:inline">Engineering & FEA</span>
                    <span class="sm:hidden">Engineering</span>
                </button>
                <button
                    class="portfolio-filter px-4 py-2 sm:px-6 sm:py-3 bg-gray-800 text-white rounded-lg text-sm sm:text-base font-semibold transition-all hover:bg-gray-700"
                    data-filter="manufacturing"
                >
                    Manufacturing
                </button>
                <button
                    class="portfolio-filter px-4 py-2 sm:px-6 sm:py-3 bg-gray-800 text-white rounded-lg text-sm sm:text-base font-semibold transition-all hover:bg-gray-700"
                    data-filter="unreal"
                >
                    <span class="hidden sm:inline">3D & Unreal Studio</span>
                    <span class="sm:hidden">3D Studio</span>
                </button>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8" id="portfolio-container">
                <?php if (empty($allProjects)): ?>
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-400 text-lg">Portfolio projects coming soon...</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($allProjects as $project): ?>
                        <article
                            class="portfolio-item group bg-gray-800/50 rounded-xl overflow-hidden border border-gray-700 hover:border-red-500 transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/20"
                            data-category="<?= h($project['category']) ?>"
                        >
                            <!-- Project Image -->
                            <div class="relative aspect-video overflow-hidden bg-gray-900">
                                <img
                                    src="<?= asset($project['image']) ?>"
                                    alt="<?= h($project['title']) ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>

                                <!-- Category Badge -->
                                <div class="absolute top-3 right-3 sm:top-4 sm:right-4">
                                    <span class="px-2 py-1 sm:px-3 sm:py-1 bg-red-600/90 text-white rounded-full text-xs font-semibold backdrop-blur-sm">
                                        <?= h($project['categoryLabel']) ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Project Info -->
                            <div class="p-4 sm:p-6">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors">
                                    <?= h($project['title']) ?>
                                </h3>
                                <p class="text-gray-300 text-sm mb-4">
                                    <?= h($project['description']) ?>
                                </p>

                                <?php if (isset($project['category']) && $project['category'] !== 'manufacturing'): ?>
                                    <button
                                        class="text-blue-400 hover:text-red-300 font-semibold text-sm flex items-center gap-2 transition-colors"
                                        onclick="openModal(<?= htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8') ?>)"
                                    >
                                        View Details
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- No Results Message (hidden by default) -->
            <div id="no-results" class="hidden text-center py-12">
                <p class="text-gray-400 text-lg">No projects found in this category.</p>
            </div>
        </div>
    </section>

    <!-- Modal for Project Details -->
    <div id="project-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80" onclick="closeModal(event)">
        <div class="bg-gray-900 rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto border border-gray-700" onclick="event.stopPropagation()">
            <div class="relative">
                <!-- Close Button -->
                <button
                    onclick="closeModal()"
                    class="absolute top-4 right-4 z-10 w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-full flex items-center justify-center text-white transition-colors"
                    aria-label="Close modal"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Modal Content -->
                <div id="modal-content">
                    <!-- Content will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-900 to-gray-950 border-t border-gray-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 sm:mb-6">
                Ready to Start Your Project?
            </h2>
            <p class="text-base sm:text-lg md:text-xl text-gray-300 mb-6 sm:mb-8 max-w-3xl mx-auto">
                Whether you need FEA validation, precision manufacturing, or immersive VR experiences—we deliver complete solutions from concept to deployment.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-stretch sm:items-center max-w-2xl mx-auto">
                <a
                    href="<?= asset('contact.php') ?>"
                    class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-red-500 to-red-600 text-white text-base sm:text-lg font-bold rounded-lg hover:from-red-600 hover:to-red-700 transition-all shadow-lg text-center"
                >
                    Get Started →
                </a>
                <a
                    href="<?= asset('solutions.php') ?>"
                    class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-gray-800 text-white text-base sm:text-lg font-semibold rounded-lg hover:bg-gray-700 transition-all border border-gray-700 text-center"
                >
                    <span class="hidden md:inline">Explore Solutions by Industry</span>
                    <span class="md:hidden">View Solutions</span>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Portfolio Filter JavaScript -->
<script src="<?= asset('assets/js/portfolio-filter.js') ?>"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
