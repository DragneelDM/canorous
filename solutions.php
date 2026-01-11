<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page_title = 'Solutions by Industry | Canorous';
$page_description = 'Tailored engineering, 3D visualization, and VR/AR solutions for manufacturers, architects, product designers, and enterprise. Integrated pipelines delivering design validation to immersive client experiences.';
$page_keywords = 'manufacturing solutions, architectural visualization, product design engineering, enterprise VR, FEA simulation, Unreal Engine, Canorous';

$solutions = [
    [
        'id' => 'manufacturers',
        'persona' => 'Manufacturers & Product Companies',
        'challenge' => 'Validate designs before manufacturing and demo products without physical prototypes',
        'solution' => 'FEA Simulation → 3D Modeling → VR Product Configurator',
        'outcome' => 'Show clients a product that doesn\'t exist yet—and make them believe it does.',
        'icon' => '🏭',
        'services' => ['Engineering', 'FEA Analysis', '3D Studio', 'VR/AR'],
        'benefits' => [
            'Reduce prototyping costs by 60% with virtual validation',
            'Close sales faster with immersive VR product demos',
            'Iterate designs rapidly based on FEA simulation results',
            'Deploy pixel-streamed configurators accessible from any browser',
        ],
        'processSteps' => [
            ['step' => 'CAD Engineering', 'desc' => 'Product design and mechanical engineering'],
            ['step' => 'FEA Validation', 'desc' => 'Stress analysis, thermal, CFD simulation'],
            ['step' => '3D Visualization', 'desc' => 'Photorealistic Blender/Substance assets'],
            ['step' => 'VR Configurator', 'desc' => 'Interactive Unreal Engine experience'],
        ],
        'portfolioImages' => [
            'public/images/img1.png',
            'public/images/img2.jpg',
            'public/images/bracket.jpg',
        ],
    ],
    [
        'id' => 'architects',
        'persona' => 'Architects & Real Estate',
        'challenge' => 'Clients can\'t visualize designs from 2D plans',
        'solution' => 'Archviz in Unreal → Pixel Streaming → Browser-Based Walkthrough',
        'outcome' => 'Let clients walk through buildings before the first brick is laid.',
        'icon' => '🏗️',
        'services' => ['Unreal Studio', '3D Studio', 'Pixel Streaming'],
        'benefits' => [
            'Win more projects with photorealistic architectural visualization',
            'Enable remote client walkthroughs via any web browser',
            'No VR headset or powerful hardware required',
            'Make design changes in real-time during client presentations',
        ],
        'processSteps' => [
            ['step' => 'Architectural Modeling', 'desc' => 'Blender modeling from CAD/blueprints'],
            ['step' => 'Material & Lighting', 'desc' => 'Substance textures, Unreal lighting'],
            ['step' => 'Unreal Integration', 'desc' => 'Real-time rendering optimization'],
            ['step' => 'Pixel Streaming', 'desc' => 'Cloud deployment for browser access'],
        ],
        'portfolioImages' => [
            'public/images/img3.gif',
            'public/images/img4.png',
            'public/images/img5.jpg',
        ],
    ],
    [
        'id' => 'designers',
        'persona' => 'Product Design Studios',
        'challenge' => 'Need rapid iteration between design, analysis, and client presentations',
        'solution' => 'CAD Engineering → FEA/CFD → Photorealistic Renders → AR Demos',
        'outcome' => 'From concept sketch to AR prototype in one pipeline.',
        'icon' => '🎨',
        'services' => ['Engineering', 'FEA/CFD', '3D Studio', 'AR Development'],
        'benefits' => [
            'Accelerate design iteration with integrated FEA feedback',
            'Present concepts to clients in augmented reality',
            'Validate form, fit, and function before physical prototyping',
            'Deliver marketing-ready renders alongside engineering data',
        ],
        'processSteps' => [
            ['step' => 'Concept CAD', 'desc' => 'Industrial design and CAD modeling'],
            ['step' => 'Performance Analysis', 'desc' => 'FEA/CFD to validate design'],
            ['step' => 'Photorealistic 3D', 'desc' => 'Marketing-ready visualizations'],
            ['step' => 'AR Experience', 'desc' => 'Mobile AR for client demos'],
        ],
        'portfolioImages' => [
            'public/images/img6.jpg',
            'public/images/brass.jpg',
            'public/images/crimps.jpg',
        ],
    ],
    [
        'id' => 'enterprise',
        'persona' => 'Enterprise & Training',
        'challenge' => 'Need custom digital experiences without hiring a full in-house team',
        'solution' => 'Custom Unreal/Unity Apps → Full-Stack Backend → Cloud Deployment',
        'outcome' => 'Turnkey digital twins, training sims, and process tools—from concept to cloud.',
        'icon' => '🏢',
        'services' => ['Unreal Studio', 'Full-Stack Dev', 'Pixel Streaming'],
        'benefits' => [
            'Deploy custom training simulators without in-house dev team',
            'Build digital twins with real-time data integration',
            'Scale to thousands of users with cloud infrastructure',
            'Integrate with existing enterprise systems (APIs, databases)',
        ],
        'processSteps' => [
            ['step' => 'Requirements', 'desc' => 'Define use cases and workflows'],
            ['step' => 'Unreal/Unity Dev', 'desc' => 'Custom application development'],
            ['step' => 'Backend Integration', 'desc' => 'APIs, databases, user management'],
            ['step' => 'Cloud Deployment', 'desc' => 'Scalable hosting and support'],
        ],
        'portfolioImages' => [
            'public/images/Galvanized.jpg',
            'public/images/pullev.jpg',
            'public/images/slings.jpg',
        ],
    ],
];
?>

<main>
    <?php
    // Hero Component
    $headline = 'Solutions by Industry';
    $subbrands = ['For Manufacturers', 'For Architects & Real Estate', 'For Product Designers', 'For Enterprise & Training'];
    $subtitle = 'Tailored pipelines that combine engineering, 3D visualization, and VR/AR—designed for your industry\'s unique challenges.';
    $ctaText = 'Explore Solutions';
    $ctaLink = '#manufacturers';
    $backgroundType = 'video';
    $backgroundVideo = 'public/videos/CanorousPromo.mp4';
    $overlayColor = 'bg-gray-900/60';
    include __DIR__ . '/components/hero.php';
    ?>

    <!-- Solutions Sections -->
    <?php foreach ($solutions as $idx => $sol): ?>
        <section
            id="<?= h($sol['id']) ?>"
            class="py-20 <?= $idx % 2 === 0 ? 'bg-gradient-to-b from-gray-950 to-gray-900' : 'bg-gradient-to-b from-gray-900 to-gray-950' ?>"
        >
            <div class="max-w-7xl mx-auto px-6">
                <!-- Header -->
                <div class="text-center mb-12">
                    <div class="text-6xl mb-4"><?= $sol['icon'] ?></div>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                        <?= h($sol['persona']) ?>
                    </h2>
                    <p class="text-xl text-blue-400 mb-2">
                        <strong>Challenge:</strong> <?= h($sol['challenge']) ?>
                    </p>
                    <p class="text-lg text-gray-300 font-mono">
                        <?= h($sol['solution']) ?>
                    </p>
                </div>

                <!-- Process Flow -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-white text-center mb-8">Our Process</h3>
                    <div class="grid md:grid-cols-4 gap-4">
                        <?php foreach ($sol['processSteps'] as $stepIdx => $process): ?>
                            <div class="bg-gray-800/60 rounded-xl p-6 border border-gray-700 text-center">
                                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">
                                    <?= $stepIdx + 1 ?>
                                </div>
                                <h4 class="text-lg font-bold text-white mb-2"><?= h($process['step']) ?></h4>
                                <p class="text-sm text-gray-300"><?= h($process['desc']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Two Column: Benefits + Portfolio -->
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Benefits -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">Key Benefits</h3>
                        <ul class="space-y-4">
                            <?php foreach ($sol['benefits'] as $benefit): ?>
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-400 text-2xl flex-shrink-0">✓</span>
                                    <span class="text-gray-200 text-lg"><?= h($benefit) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- Services Used -->
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold text-white mb-3">Services Used:</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($sol['services'] as $service): ?>
                                    <span class="px-4 py-2 bg-red-600/20 text-red-300 rounded-full text-sm font-medium border border-red-500/30">
                                        <?= h($service) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Preview -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">Portfolio Examples</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <?php foreach ($sol['portfolioImages'] as $img): ?>
                                <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-700 hover:border-red-500 transition-colors">
                                    <img
                                        src="<?= asset($img) ?>"
                                        alt="Portfolio example"
                                        class="w-full h-full object-cover"
                                    />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Outcome Quote -->
                <div class="mt-12 text-center">
                    <blockquote class="text-2xl md:text-3xl font-bold text-white italic">
                        "<?= h($sol['outcome']) ?>"
                    </blockquote>
                </div>

                <!-- CTA -->
                <div class="mt-10 text-center">
                    <a
                        href="<?= asset('contact.php') ?>"
                        class="inline-block px-8 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold rounded-lg hover:from-red-600 hover:to-red-700 transition-all transform hover:scale-105 shadow-lg shadow-red-500/30"
                    >
                        Discuss Your <?= h($sol['persona']) ?> Project →
                    </a>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <!-- Not Sure Section -->
    <section class="py-20 bg-gradient-to-b from-gray-950 to-gray-900 border-t border-gray-800">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Not Sure Which Solution Fits Your Needs?
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Every project is unique. Schedule a free consultation to discuss your specific requirements and discover how our integrated pipeline can deliver results.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a
                    href="<?= asset('contact.php') ?>"
                    class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    Schedule a Consultation
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

<?php require_once __DIR__ . '/includes/footer.php'; ?>
