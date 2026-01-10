<?php
/**
 * What Sets Us Apart Component
 * Value proposition cards with CSS animations (no Framer Motion)
 */

$points = [
    [
        'title' => 'Customer-Centric Approach',
        'desc' => 'We work closely with our clients to deeply understand their challenges and develop customized solutions.',
    ],
    [
        'title' => 'End-to-End Engineering Solutions',
        'desc' => 'From conceptual design and manufacturing to virtual/physical validation, we provide a comprehensive engineering package or modular services based on client requirements.',
    ],
    [
        'title' => 'Process Optimization & Efficiency Enhancement',
        'desc' => 'Leveraging cutting-edge technology, we help businesses streamline processes, enhance productivity, and drive innovation.',
    ],
    [
        'title' => 'Emerging Industry Leader',
        'desc' => 'With a versatile portfolio and commitment to excellence, we are an emerging player in the global engineering landscape.',
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
                <div class="bg-gray-800 rounded-xl p-6 shadow hover:shadow-xl transition opacity-0 animate-fade-in-up" style="animation-delay: <?= $idx * 0.2 ?>s;">
                    <h3 class="text-xl font-semibold mb-3"><?= h($point['title']) ?></h3>
                    <p class="text-gray-300 text-sm"><?= h($point['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="mt-12 text-center text-gray-300 text-lg md:text-xl opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
            At Canorous, we don't just solve problems—we engineer possibilities. Whether you're looking for design, prototyping, manufacturing, or process optimization, we are your trusted partner for shaping the future of engineering.
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
