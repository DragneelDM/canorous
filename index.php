<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Canorous | Engineering, Manufacturing, 3D Visualization, and Unreal Studio';
$page_description = 'Canorous delivers end-to-end engineering, turnkey manufacturing, 3D visualization, and Unreal Studio VR/AR solutions for industries worldwide.';
$page_keywords = 'MEP engineering, turnkey manufacturing, Unreal Engine, VR/AR, 3D visualization, product design, engineering solutions, Canorous';
?>

<main>
    <?php
    // Hero Component
    $headline = 'The Full-Stack Innovation Partner';
    $subbrands = ['Engineering & FEA Simulation', '3D Pipeline: Blender to Unreal', 'VR/AR & Pixel Streaming', 'Full-Stack Development'];
    $subtitle = 'From engineering validation to immersive visualization to web deployment—delivered by one integrated team.';
    $ctaText = 'Explore Our Capabilities';
    $ctaLink = '#capabilities';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/CanorousPromo.mp4';
    $overlayColor = 'bg-gray-900/40';
    include __DIR__ . '/components/hero.php';
    ?>

    <?php
    // Solution Paths Component - Customer Personas
    include __DIR__ . '/components/solution-paths.php';
    ?>

    <?php
    // What Sets Us Apart Component
    include __DIR__ . '/components/what-sets-us-apart.php';
    ?>

    <!-- Featured Portfolio Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-900 to-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <p class="text-blue-400 uppercase tracking-[0.2em] sm:tracking-[0.3em] text-xs sm:text-sm font-semibold mb-2 sm:mb-3">
                    Our Work
                </p>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4">
                    Featured Projects
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto px-4">
                    Engineering validation, 3D visualization, and VR experiences—delivered as one integrated solution.
                </p>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <?php
                // Load featured projects from each domain (2 from each)
                $engineeringData = load_json_data('engineering.json');
                $manufacturingData = load_json_data('manufacturing.json');
                $unrealData = load_json_data('unreal-studio.json');

                // Get first 2 engineering projects
                $featuredEngineering = array_slice($engineeringData, 0, 2);
                // Get first 2 manufacturing projects
                $featuredManufacturing = array_slice($manufacturingData, 0, 2);
                // Get first 2 Unreal projects (featured ones)
                $featuredUnreal = array_slice(array_filter($unrealData, fn($p) => isset($p['featured']) && $p['featured']), 0, 2);

                // Combine featured projects with category labels
                $featuredProjects = array_merge(
                    array_map(fn($p) => array_merge($p, ['category' => 'Engineering & FEA']), $featuredEngineering),
                    array_map(fn($p) => array_merge($p, ['category' => 'Manufacturing']), $featuredManufacturing),
                    array_map(fn($p) => array_merge($p, ['category' => '3D & Unreal Studio']), $featuredUnreal)
                );

                foreach ($featuredProjects as $project):
                ?>
                    <article class="group bg-gray-800/50 rounded-xl overflow-hidden border border-gray-700 hover:border-red-500 transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/20">
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
                                <span class="px-2 py-1 sm:px-3 sm:py-1 bg-red-600 text-white rounded-full text-xs font-semibold backdrop-blur-sm">
                                    <?= h($project['category']) ?>
                                </span>
                            </div>
                        </div>

                        <!-- Project Info -->
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                                <?= h($project['title']) ?>
                            </h3>
                            <p class="text-gray-300 text-sm sm:text-base">
                                <?= h($project['description']) ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- CTA to Full Portfolio -->
            <div class="text-center mt-8 sm:mt-10 md:mt-12">
                <a
                    href="<?= asset('portfolio.php') ?>"
                    class="inline-block w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-base sm:text-lg font-bold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    View Full Portfolio →
                </a>
            </div>
        </div>
    </section>

    <?php
    // Clients Section Component
    $page = 'landing';
    include __DIR__ . '/components/clients-section.php';
    ?>
</main>

<!-- SEO: Structured Data (JSON-LD) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Canorous Technologies",
  "url": "<?= BASE_URL ?>",
  "logo": "<?= asset('public/images/logo.png') ?>",
  "description": "Full-stack innovation partner delivering end-to-end engineering, manufacturing, 3D visualization, and Unreal Studio VR/AR solutions.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "96-A, 1st Floor, Bharathi Colony, 2nd Cross East, Peelamedu",
    "addressLocality": "Coimbatore",
    "postalCode": "641004",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-90877-44900",
    "contactType": "Sales",
    "email": "sales@can-india.co.in",
    "areaServed": "Worldwide",
    "availableLanguage": ["English"]
  },
  "sameAs": [
    "https://www.linkedin.com/company/canorous-technologies-private-limited"
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Engineering & VR Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Engineering & FEA Simulation",
          "description": "CAD engineering, FEA/CFD simulation, product design validation"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Precision Manufacturing",
          "description": "ISO 9001:2015 certified turnkey manufacturing solutions"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Unreal Studio & 3D Pipeline",
          "description": "Blender to Substance to Unreal/Unity pipeline, VR/AR development, architectural visualization"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Full-Stack Development",
          "description": "Web applications, APIs, cloud deployment, pixel streaming"
        }
      }
    ]
  },
  "founder": {
    "@type": "Person",
    "name": "Canorous Technologies Founder"
  },
  "foundingDate": "2015",
  "numberOfEmployees": {
    "@type": "QuantitativeValue",
    "value": "10-50"
  },
  "slogan": "The Full-Stack Innovation Partner"
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
