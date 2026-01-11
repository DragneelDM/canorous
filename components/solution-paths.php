<?php
/**
 * Solution Paths Component
 * Shows different customer personas and their journeys through Canorous services
 */

$solutions = [
    [
        'persona' => 'Manufacturers & Product Companies',
        'challenge' => 'Validate designs before manufacturing and demo products without physical prototypes',
        'solution' => 'FEA Simulation → 3D Modeling → VR Product Configurator',
        'outcome' => 'Show clients a product that doesn\'t exist yet—and make them believe it does.',
        'icon' => '🏭',
        'services' => ['Engineering', 'FEA Analysis', '3D Studio', 'VR/AR'],
    ],
    [
        'persona' => 'Architects & Real Estate',
        'challenge' => 'Clients can\'t visualize designs from 2D plans',
        'solution' => 'Archviz in Unreal → Pixel Streaming → Browser-Based Walkthrough',
        'outcome' => 'Let clients walk through buildings before the first brick is laid.',
        'icon' => '🏗️',
        'services' => ['Unreal Studio', '3D Studio', 'Pixel Streaming'],
    ],
    [
        'persona' => 'Product Design Studios',
        'challenge' => 'Need rapid iteration between design, analysis, and client presentations',
        'solution' => 'CAD Engineering → FEA/CFD → Photorealistic Renders → AR Demos',
        'outcome' => 'From concept sketch to AR prototype in one pipeline.',
        'icon' => '🎨',
        'services' => ['Engineering', 'FEA/CFD', '3D Studio', 'AR Development'],
    ],
    [
        'persona' => 'Enterprise & Training',
        'challenge' => 'Need custom digital experiences without hiring a full in-house team',
        'solution' => 'Custom Unreal/Unity Apps → Full-Stack Backend → Cloud Deployment',
        'outcome' => 'Turnkey digital twins, training sims, and process tools—from concept to cloud.',
        'icon' => '🏢',
        'services' => ['Unreal Studio', 'Full-Stack Dev', 'Pixel Streaming'],
    ],
];
?>

<section id="capabilities" class="py-20 bg-gradient-to-b from-gray-950 to-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-blue-400 uppercase tracking-[0.3em] text-sm font-semibold mb-3">
                One Team, Multiple Solutions
            </p>
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Who We Serve & How We Deliver
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Different industries, different challenges—same integrated pipeline.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <?php foreach ($solutions as $idx => $sol): ?>
                <article class="group bg-gradient-to-br from-gray-800/60 to-gray-900/80 rounded-2xl p-8 border border-gray-700/50 hover:border-red-500/50 transition-all duration-300 hover:shadow-2xl hover:shadow-red-500/10">
                    <div class="flex items-start gap-4 mb-6">
                        <span class="text-5xl" role="img" aria-label="<?= h($sol['persona']) ?>"><?= $sol['icon'] ?></span>
                        <div>
                            <h3 class="text-2xl font-bold text-white group-hover:text-blue-400 transition-colors">
                                <?= h($sol['persona']) ?>
                            </h3>
                            <p class="text-gray-400 text-sm mt-1">
                                <strong>Challenge:</strong> <?= h($sol['challenge']) ?>
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-gray-950/50 rounded-lg p-4 border-l-4 border-red-500">
                            <p class="text-sm text-gray-400 uppercase tracking-wide mb-2">Our Solution</p>
                            <p class="text-white font-mono text-sm">
                                <?= h($sol['solution']) ?>
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($sol['services'] as $service): ?>
                                <span class="px-3 py-1 bg-red-600/20 text-red-300 rounded-full text-xs font-medium border border-red-500/30">
                                    <?= h($service) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <blockquote class="italic text-gray-300 text-lg border-l-2 border-gray-700 pl-4 mt-4">
                            "<?= h($sol['outcome']) ?>"
                        </blockquote>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 text-center">
            <p class="text-gray-400 mb-6 text-lg">
                Not sure which solution fits your needs?
            </p>
            <a
                href="<?= asset('contact.php') ?>"
                class="inline-block px-8 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold rounded-lg hover:from-red-600 hover:to-red-700 transition-all transform hover:scale-105 shadow-lg shadow-red-500/30"
            >
                Schedule a Consultation →
            </a>
        </div>
    </div>
</section>
