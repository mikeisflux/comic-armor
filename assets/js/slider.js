/**
 * Comic Armor Hero Slider
 *
 * @package Comic_Armor
 */

(function($) {
    'use strict';

    class HeroSlider {
        constructor(element) {
            this.$slider = $(element);
            this.$slides = this.$slider.find('.slide');
            this.$dots = this.$slider.find('.slider-dot');
            this.$prevBtn = this.$slider.find('.slider-arrow.prev');
            this.$nextBtn = this.$slider.find('.slider-arrow.next');

            this.currentSlide = 0;
            this.slideCount = this.$slides.length;
            this.autoplayInterval = null;
            this.autoplayDelay = 6000;
            this.isAnimating = false;

            this.init();
        }

        init() {
            this.bindEvents();
            this.startAutoplay();
        }

        bindEvents() {
            // Dot navigation
            this.$dots.on('click', (e) => {
                const index = $(e.currentTarget).data('slide') - 1;
                this.goToSlide(index);
            });

            // Arrow navigation
            this.$prevBtn.on('click', () => {
                this.prevSlide();
            });

            this.$nextBtn.on('click', () => {
                this.nextSlide();
            });

            // Keyboard navigation
            $(document).on('keydown', (e) => {
                if (this.isSliderInView()) {
                    if (e.key === 'ArrowLeft') {
                        this.prevSlide();
                    } else if (e.key === 'ArrowRight') {
                        this.nextSlide();
                    }
                }
            });

            // Touch/swipe support
            let touchStartX = 0;
            let touchEndX = 0;

            this.$slider.on('touchstart', (e) => {
                touchStartX = e.originalEvent.touches[0].clientX;
            });

            this.$slider.on('touchend', (e) => {
                touchEndX = e.originalEvent.changedTouches[0].clientX;
                this.handleSwipe(touchStartX, touchEndX);
            });

            // Pause autoplay on hover
            this.$slider.on('mouseenter', () => {
                this.stopAutoplay();
            });

            this.$slider.on('mouseleave', () => {
                this.startAutoplay();
            });

            // Pause when tab is not visible
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.stopAutoplay();
                } else {
                    this.startAutoplay();
                }
            });
        }

        goToSlide(index) {
            if (this.isAnimating || index === this.currentSlide) {
                return;
            }

            this.isAnimating = true;

            // Remove active class from current slide
            this.$slides.eq(this.currentSlide).removeClass('active');
            this.$dots.eq(this.currentSlide).removeClass('active');

            // Update current slide index
            this.currentSlide = index;

            // Handle wrapping
            if (this.currentSlide >= this.slideCount) {
                this.currentSlide = 0;
            } else if (this.currentSlide < 0) {
                this.currentSlide = this.slideCount - 1;
            }

            // Add active class to new slide
            this.$slides.eq(this.currentSlide).addClass('active');
            this.$dots.eq(this.currentSlide).addClass('active');

            // Reset autoplay
            this.resetAutoplay();

            // Animation complete
            setTimeout(() => {
                this.isAnimating = false;
            }, 500);
        }

        nextSlide() {
            this.goToSlide(this.currentSlide + 1);
        }

        prevSlide() {
            this.goToSlide(this.currentSlide - 1);
        }

        handleSwipe(startX, endX) {
            const threshold = 50;
            const diff = startX - endX;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        }

        startAutoplay() {
            if (this.autoplayInterval) {
                return;
            }

            this.autoplayInterval = setInterval(() => {
                this.nextSlide();
            }, this.autoplayDelay);
        }

        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        }

        resetAutoplay() {
            this.stopAutoplay();
            this.startAutoplay();
        }

        isSliderInView() {
            const rect = this.$slider[0].getBoundingClientRect();
            return (
                rect.top < window.innerHeight &&
                rect.bottom > 0
            );
        }
    }

    // Initialize slider when document is ready
    $(document).ready(function() {
        const $heroSlider = $('.hero-slider');

        if ($heroSlider.length) {
            new HeroSlider($heroSlider);
        }
    });

})(jQuery);
