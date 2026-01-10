// Vanilla JavaScript portfolio slider (replaces Swiper.js)
document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.portfolio-slider');
    
    sliders.forEach(function(slider) {
        const container = slider.querySelector('.slider-container');
        const slides = slider.querySelectorAll('.slider-slide');
        const prevButton = slider.querySelector('.slider-prev');
        const nextButton = slider.querySelector('.slider-next');
        const pagination = slider.querySelector('.slider-pagination');
        const autoplay = slider.dataset.autoplay === 'true';
        const autoplayDelay = parseInt(slider.dataset.autoplayDelay || '3000', 10);
        
        if (!container || slides.length === 0) return;
        
        let currentIndex = 0;
        let autoplayInterval = null;
        
        // Create pagination dots
        if (pagination && slides.length > 1) {
            slides.forEach(function(_, index) {
                const dot = document.createElement('button');
                dot.className = 'slider-dot' + (index === 0 ? ' active' : '');
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                dot.addEventListener('click', function() {
                    goToSlide(index);
                });
                pagination.appendChild(dot);
            });
        }
        
        function updateSlider() {
            // Hide all slides
            slides.forEach(function(slide, index) {
                slide.classList.remove('active');
                if (pagination) {
                    const dots = pagination.querySelectorAll('.slider-dot');
                    if (dots[index]) {
                        dots[index].classList.remove('active');
                    }
                }
            });
            
            // Show current slide
            if (slides[currentIndex]) {
                slides[currentIndex].classList.add('active');
                if (pagination) {
                    const dots = pagination.querySelectorAll('.slider-dot');
                    if (dots[currentIndex]) {
                        dots[currentIndex].classList.add('active');
                    }
                }
            }
        }
        
        function goToSlide(index) {
            if (index < 0) {
                currentIndex = slides.length - 1;
            } else if (index >= slides.length) {
                currentIndex = 0;
            } else {
                currentIndex = index;
            }
            updateSlider();
            resetAutoplay();
        }
        
        function nextSlide() {
            goToSlide(currentIndex + 1);
        }
        
        function prevSlide() {
            goToSlide(currentIndex - 1);
        }
        
        function startAutoplay() {
            if (autoplay && slides.length > 1) {
                autoplayInterval = setInterval(nextSlide, autoplayDelay);
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
            nextButton.addEventListener('click', function() {
                nextSlide();
            });
        }
        
        if (prevButton) {
            prevButton.addEventListener('click', function() {
                prevSlide();
            });
        }
        
        // Pause autoplay on hover
        if (autoplay) {
            slider.addEventListener('mouseenter', stopAutoplay);
            slider.addEventListener('mouseleave', startAutoplay);
        }
        
        // Touch/swipe support (basic)
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
    });
});
