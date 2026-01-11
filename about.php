<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'About Canorous | Engineering, Manufacturing & VR/AR Innovation';
$page_description = 'Canorous delivers integrated engineering, manufacturing, and immersive visualization solutions. ISO 9001:2015 certified. From FEA simulation to VR deployment—one team, one pipeline.';
$page_keywords = 'about Canorous, engineering company, ISO 9001 certified, VR AR development, 3D visualization, FEA simulation, manufacturing';

$capabilities = [
    [
        'title' => 'Mechanical Engineering & FEA',
        'desc' => 'Product design, CAD engineering, FEA/CFD simulation, and design validation',
        'icon' => '⚙️',
    ],
    [
        'title' => '3D Art & Animation',
        'desc' => 'Blender modeling, Substance texturing, photorealistic rendering, game-ready optimization',
        'icon' => '🎨',
    ],
    [
        'title' => 'Unreal Engine & Unity Development',
        'desc' => 'VR/AR experiences, architectural visualization, pixel streaming, interactive applications',
        'icon' => '🥽',
    ],
    [
        'title' => 'Full-Stack Development',
        'desc' => 'Web applications, APIs, databases, cloud deployment, system integration',
        'icon' => '💻',
    ],
    [
        'title' => 'Precision Manufacturing',
        'desc' => 'Turnkey manufacturing solutions, global supply chain management, ISO 9001:2015 certified',
        'icon' => '🏭',
    ],
    [
        'title' => 'Project Management',
        'desc' => 'End-to-end project coordination, multi-disciplinary team leadership, client communication',
        'icon' => '📋',
    ],
];

$differentiators = [
    [
        'title' => 'Integrated Pipeline',
        'desc' => 'Most companies need 3-5 vendors to go from engineering design to immersive VR. We deliver it all as one integrated team—no handoffs, no miscommunication.',
    ],
    [
        'title' => 'Multi-Disciplinary Expertise',
        'desc' => 'Our team combines mechanical engineers, 3D artists, software developers, and project managers under one roof.',
    ],
    [
        'title' => 'ISO 9001:2015 Certified',
        'desc' => 'Quality management certification ensures consistent, reliable delivery across all our services.',
    ],
    [
        'title' => 'Client-Centric Approach',
        'desc' => 'We don\'t just deliver projects—we become your extended team, adapting to your workflows and requirements.',
    ],
];
?>

<main class="bg-gray-950 text-white">
    <?php
    // Hero Component
    $headline = 'About Canorous';
    $subbrands = ['ISO 9001:2015 Certified', 'Multi-Disciplinary Team', 'Integrated Engineering-to-VR Pipeline'];
    $subtitle = 'We\'re not just an engineering firm or a visualization studio—we\'re the bridge between design validation and immersive client experiences.';
    $ctaText = 'Work With Us';
    $ctaLink = '#contact-cta';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/CanorousPromo.mp4';
    $overlayColor = 'bg-gray-900/70';
    include __DIR__ . '/components/hero.php';
    ?>

    <!-- Company Story -->
    <section class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <p class="text-blue-400 uppercase tracking-[0.2em] sm:tracking-[0.3em] text-xs sm:text-sm font-semibold mb-2 sm:mb-3">
                    Our Story
                </p>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4">
                    Engineering Possibilities
                </h2>
            </div>

            <div class="space-y-6 sm:space-y-8 text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed">
                <p>
                    Canorous was founded with a vision to integrate engineering with immersive visualization—bridging the gap between design validation and client experience.
                </p>
                <p>
                    We saw a problem: companies needed multiple vendors to go from CAD design to FEA validation to 3D visualization to VR deployment. Each handoff introduced delays, miscommunication, and compromised quality.
                </p>
                <p>
                    Our solution: build a team that owns the entire pipeline. Mechanical engineers who understand FEA. 3D artists who understand engineering constraints. Software developers who understand both. Project managers who coordinate it all seamlessly.
                </p>
                <p class="text-xl font-semibold text-white">
                    Today, we deliver complete solutions—from engineering validation to immersive VR experiences—as one integrated team.
                </p>
            </div>
        </div>
    </section>

    <!-- What Makes Us Different -->
    <section class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-900 to-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 sm:mb-12 md:mb-16">
                <p class="text-blue-400 uppercase tracking-[0.2em] sm:tracking-[0.3em] text-xs sm:text-sm font-semibold mb-2 sm:mb-3">
                    Our Advantage
                </p>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4">
                    What Makes Us Different
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto px-4">
                    We're not generalists. We specialize in the intersection of engineering, manufacturing, and immersive visualization.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <?php foreach ($differentiators as $item): ?>
                    <div class="bg-gray-800/50 rounded-xl p-8 border border-gray-700 hover:border-red-500 transition-all">
                        <h3 class="text-2xl font-bold text-blue-400 mb-4"><?= h($item['title']) ?></h3>
                        <p class="text-gray-300 text-lg"><?= h($item['desc']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Team Capabilities -->
    <section class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <p class="text-blue-400 uppercase tracking-[0.3em] text-sm font-semibold mb-3">
                    Our Capabilities
                </p>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Multi-Disciplinary Expertise
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Our team brings together diverse skills under one roof—from mechanical engineering to immersive VR development.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($capabilities as $cap): ?>
                    <div class="bg-gray-800/60 rounded-xl p-8 border border-gray-700 text-center hover:border-red-500 transition-all">
                        <div class="text-5xl mb-4"><?= $cap['icon'] ?></div>
                        <h3 class="text-xl font-bold text-white mb-3"><?= h($cap['title']) ?></h3>
                        <p class="text-gray-300"><?= h($cap['desc']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ISO Certification -->
    <section class="py-20 bg-gradient-to-b from-gray-900 to-gray-950 border-y border-gray-800">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-blue-400 uppercase tracking-[0.3em] text-sm font-semibold mb-3">
                        Quality Certification
                    </p>
                    <h2 class="text-4xl font-bold text-white mb-6">
                        ISO 9001:2015 Certified
                    </h2>
                    <p class="text-lg text-gray-300 leading-relaxed mb-6">
                        Our ISO 9001:2015 certification demonstrates our commitment to quality management across all services—from engineering and manufacturing to software development and VR deployment.
                    </p>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        This certification ensures consistent processes, continuous improvement, and reliable delivery on every project we undertake.
                    </p>
                </div>

                <div class="bg-gray-800/50 rounded-xl p-12 border-2 border-red-500/30 text-center">
                    <div class="w-32 h-32 mx-auto mb-6 bg-red-600/10 rounded-full flex items-center justify-center">
                        <span class="text-6xl">✓</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">ISO 9001:2015</h3>
                    <p class="text-blue-400 font-semibold mb-4">Quality Management System</p>
                    <p class="text-gray-300 text-sm">
                        Certified for engineering, manufacturing, and digital solution delivery
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact-cta" class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Ready to Work Together?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                Whether you need engineering validation, precision manufacturing, or immersive VR experiences—let's discuss how our integrated pipeline can deliver results for your project.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a
                    href="<?= asset('contact.php') ?>"
                    class="px-8 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold rounded-lg hover:from-red-600 hover:to-red-700 transition-all shadow-lg"
                >
                    Schedule a Consultation →
                </a>
                <a
                    href="<?= asset('portfolio.php') ?>"
                    class="px-8 py-4 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-all border border-gray-700"
                >
                    View Our Portfolio
                </a>
            </div>
        </div>
    </section>
</main>

<!-- SEO: Structured Data (JSON-LD) for About Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "name": "Canorous Technologies",
      "url": "<?= BASE_URL ?>",
      "logo": "<?= asset('public/images/logo.png') ?>",
      "description": "Multi-disciplinary team delivering integrated engineering, manufacturing, and immersive visualization solutions.",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "96-A, 1st Floor, Bharathi Colony, 2nd Cross East, Peelamedu",
        "addressLocality": "Coimbatore",
        "postalCode": "641004",
        "addressCountry": "IN"
      },
      "foundingDate": "2015",
      "knowsAbout": [
        "Mechanical Engineering",
        "FEA Simulation",
        "CFD Analysis",
        "3D Modeling",
        "Blender",
        "Substance Painter",
        "Unreal Engine",
        "Unity",
        "Virtual Reality",
        "Augmented Reality",
        "Architectural Visualization",
        "Full-Stack Development",
        "Precision Manufacturing"
      ],
      "slogan": "Engineering Possibilities",
      "certification": {
        "@type": "Certification",
        "name": "ISO 9001:2015 Quality Management System",
        "issuedBy": {
          "@type": "Organization",
          "name": "ISO"
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "<?= BASE_URL ?>"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "About",
          "item": "<?= asset('about.php') ?>"
        }
      ]
    }
  ]
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
