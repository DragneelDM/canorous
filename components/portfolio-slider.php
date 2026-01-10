<?php
/**
 * Unified Portfolio Slider Component
 * 
 * @param array $data - Array of portfolio items with 'image', 'alt' (optional), 'title' (optional)
 * @param int $slidesPerView - Number of slides per view (1, 2, or 3, default: 3)
 * @param bool $showModal - Whether to show fullscreen modal on click (default: true)
 * @param bool $autoplay - Whether to autoplay slider (default: true)
 */
$data = $data ?? [];
$slidesPerView = $slidesPerView ?? 3;
$showModal = $showModal ?? true;
$autoplay = $autoplay ?? true;

if (empty($data)) {
    return;
}

// Ensure slidesPerView is valid
$slidesPerView = max(1, min(3, (int)$slidesPerView));
$sliderId = 'portfolio-slider-' . uniqid();
?>
<div class="w-full max-w-6xl mx-auto py-12">
    <div class="portfolio-slider" 
         id="<?= h($sliderId) ?>"
         data-autoplay="<?= $autoplay ? 'true' : 'false' ?>"
         data-slides-per-view="<?= $slidesPerView ?>">
        
        <div class="slider-container relative overflow-hidden rounded-lg">
            <div class="slider-track flex transition-transform duration-700 ease-in-out" style="transform: translateX(0);">
                <?php foreach ($data as $index => $item): ?>
                    <div class="slider-slide flex-shrink-0 w-full <?= $index === 0 ? 'active' : '' ?>" 
                         style="width: <?= 100 / $slidesPerView ?>%;"
                         data-index="<?= $index ?>">
                        <button
                            type="button"
                            class="w-full text-left p-2"
                            <?php if ($showModal): ?>
                                onclick="openPortfolioModal(<?= $index ?>)"
                            <?php endif; ?>
                        >
                            <div class="relative w-full overflow-hidden rounded-2xl border border-white/10 bg-gray-900/50 aspect-[4/3]">
                                <img
                                    src="<?= h($item['image']) ?>"
                                    alt="<?= h($item['alt'] ?? $item['title'] ?? '') ?>"
                                    class="h-full w-full object-cover object-center transition-transform duration-700 hover:scale-105"
                                />
                            </div>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-center items-center gap-4 mt-6">
            <button class="slider-prev px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition" aria-label="Previous slide">
                ←
            </button>
            <div class="slider-pagination flex gap-2"></div>
            <button class="slider-next px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition" aria-label="Next slide">
                →
            </button>
        </div>
    </div>
</div>

<?php if ($showModal): ?>
    <!-- Fullscreen Modal -->
    <div id="portfolio-modal-<?= h($sliderId) ?>" 
         class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-6 backdrop-blur"
         onclick="closePortfolioModal('<?= h($sliderId) ?>')">
        <div class="relative max-w-5xl w-full lg:w-4/5 xl:w-3/5" onclick="event.stopPropagation()">
            <button
                type="button"
                class="absolute right-4 top-4 text-white/80 hover:text-white text-4xl z-10"
                onclick="closePortfolioModal('<?= h($sliderId) ?>')"
                aria-label="Close fullscreen preview"
            >
                &times;
            </button>
            <div class="relative w-full overflow-hidden rounded-3xl border border-white/20 bg-black aspect-video md:aspect-[4/3]">
                <img
                    id="modal-image-<?= h($sliderId) ?>"
                    src=""
                    alt=""
                    class="h-full w-full object-contain"
                />
            </div>
        </div>
    </div>

    <script>
    // Portfolio modal functions
    function openPortfolioModal(index) {
        const slider = document.getElementById('<?= h($sliderId) ?>');
        const slides = slider.querySelectorAll('.slider-slide');
        const modal = document.getElementById('portfolio-modal-<?= h($sliderId) ?>');
        const modalImage = document.getElementById('modal-image-<?= h($sliderId) ?>');
        
        if (slides[index]) {
            const img = slides[index].querySelector('img');
            if (img && modal && modalImage) {
                modalImage.src = img.src;
                modalImage.alt = img.alt;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }
    }
    
    function closePortfolioModal(sliderId) {
        const modal = document.getElementById('portfolio-modal-' + sliderId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }
    
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('[id^="portfolio-modal-"]');
            modals.forEach(function(modal) {
                if (!modal.classList.contains('hidden')) {
                    const sliderId = modal.id.replace('portfolio-modal-', '');
                    closePortfolioModal(sliderId);
                }
            });
        }
    });
    </script>
<?php endif; ?>

<script>
// Initialize slider for this instance
(function() {
    const slider = document.getElementById('<?= h($sliderId) ?>');
    if (!slider) return;
    
    const container = slider.querySelector('.slider-container');
    const track = slider.querySelector('.slider-track');
    const slides = slider.querySelectorAll('.slider-slide');
    const prevButton = slider.querySelector('.slider-prev');
    const nextButton = slider.querySelector('.slider-next');
    const pagination = slider.querySelector('.slider-pagination');
    const autoplayEnabled = slider.dataset.autoplay === 'true';
    const slidesPerView = parseInt(slider.dataset.slidesPerView || '3', 10);
    
    if (!container || slides.length === 0) return;
    
    let currentIndex = 0;
    let autoplayInterval = null;
    const totalSlides = slides.length;
    const maxIndex = Math.max(0, totalSlides - slidesPerView);
    
    // Create pagination dots
    if (pagination && totalSlides > slidesPerView) {
        const totalPages = Math.ceil(totalSlides / slidesPerView);
        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('button');
            dot.className = 'slider-dot w-3 h-3 rounded-full bg-gray-600 hover:bg-gray-500 transition' + (i === 0 ? ' bg-blue-500' : '');
            dot.setAttribute('aria-label', 'Go to page ' + (i + 1));
            dot.addEventListener('click', function() {
                goToPage(i);
            });
            pagination.appendChild(dot);
        }
    }
    
    function updateSlider() {
        const translateX = -(currentIndex * (100 / slidesPerView));
        track.style.transform = `translateX(${translateX}%)`;
        
        // Update pagination
        if (pagination) {
            const dots = pagination.querySelectorAll('.slider-dot');
            const currentPage = Math.floor(currentIndex / slidesPerView);
            dots.forEach(function(dot, index) {
                if (index === currentPage) {
                    dot.classList.add('bg-blue-500');
                    dot.classList.remove('bg-gray-600');
                } else {
                    dot.classList.remove('bg-blue-500');
                    dot.classList.add('bg-gray-600');
                }
            });
        }
    }
    
    function goToPage(page) {
        currentIndex = Math.min(page * slidesPerView, maxIndex);
        updateSlider();
        resetAutoplay();
    }
    
    function nextSlide() {
        if (currentIndex >= maxIndex) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }
        updateSlider();
        resetAutoplay();
    }
    
    function prevSlide() {
        if (currentIndex <= 0) {
            currentIndex = maxIndex;
        } else {
            currentIndex--;
        }
        updateSlider();
        resetAutoplay();
    }
    
    function startAutoplay() {
        if (autoplayEnabled && totalSlides > slidesPerView) {
            autoplayInterval = setInterval(nextSlide, 3000);
        }
    }
    
    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
        }
    }
    
    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }
    
    // Event listeners
    if (nextButton) {
        nextButton.addEventListener('click', nextSlide);
    }
    
    if (prevButton) {
        prevButton.addEventListener('click', prevSlide);
    }
    
    // Pause autoplay on hover
    if (autoplayEnabled) {
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
    }
    
    // Touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    
    container.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    
    container.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    }
    
    // Initialize
    updateSlider();
    startAutoplay();
})();
</script>

<style>
.slider-track {
    display: flex;
    transition: transform 0.7s ease-in-out;
}

.slider-slide {
    padding: 0 8px;
}

@media (max-width: 640px) {
    .slider-slide {
        width: 100% !important;
    }
}

@media (min-width: 641px) and (max-width: 1023px) {
    .slider-slide[data-slides-per-view="3"] {
        width: 50% !important;
    }
}
</style>
