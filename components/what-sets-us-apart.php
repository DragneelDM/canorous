<?php
/**
 * What Sets Us Apart Component
 * Value proposition cards with CSS animations (no Framer Motion)
 */

$points = [
    [
        'title' => 'Complete 3D Pipeline: Blender → Substance → Unreal/Unity',
        'desc' => 'We own the entire asset creation workflow—from high-poly sculpting to game-ready optimization to real-time rendering. No external dependencies.',
    ],
    [
        'title' => 'Engineering + Visualization Integration',
        'desc' => 'Run FEA simulations on your product, then deploy it in VR for client demos—all in one pipeline. Design validation and sales enablement without vendor handoffs.',
    ],
    [
        'title' => 'Pixel Streaming & Cloud Deployment',
        'desc' => 'We deliver Unreal Engine experiences accessible from any browser—no downloads, no powerful hardware required. Perfect for architectural walkthroughs and product configurators.',
    ],
    [
        'title' => 'Full-Stack Development Capability',
        'desc' => 'Need custom web portals, APIs, or dashboards to support your VR experience? Our team builds end-to-end digital ecosystems, not just standalone apps.',
    ],
];
?>
<section class="py-20 bg-gray-950 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
            What Sets Us Apart
        </h2>

        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($points as $idx => $point): ?>
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500 transition-all hover:shadow-xl hover:shadow-red-500/20 opacity-0 animate-fade-in-up" style="animation-delay: <?= $idx * 0.2 ?>s;">
                    <h3 class="text-xl font-semibold mb-3 text-blue-400"><?= h($point['title']) ?></h3>
                    <p class="text-gray-300 text-sm"><?= h($point['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="mt-12 text-center text-gray-300 text-lg md:text-xl opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
            Most companies need 3-5 vendors to go from engineering design to immersive VR experience. We deliver it all—engineering, 3D assets, Unreal/Unity development, and cloud deployment—as one integrated team.
        </p>
    </div>
</section>

<style>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
}
</style>
