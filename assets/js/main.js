/**
 * Comic Armor Main JavaScript
 *
 * @package Comic_Armor
 */

(function($) {
    'use strict';

    // Header scroll effect
    const initHeaderScroll = () => {
        const $header = $('.site-header');
        let lastScroll = 0;

        $(window).on('scroll', function() {
            const currentScroll = $(window).scrollTop();

            if (currentScroll > 100) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }

            lastScroll = currentScroll;
        });
    };

    // Mobile menu toggle
    const initMobileMenu = () => {
        const $toggle = $('.mobile-menu-toggle');
        const $mobileMenu = $('.mobile-menu');
        const $body = $('body');

        $toggle.on('click', function() {
            $(this).toggleClass('active');
            $mobileMenu.toggleClass('active');
            $body.toggleClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-menu, .mobile-menu-toggle').length) {
                $toggle.removeClass('active');
                $mobileMenu.removeClass('active');
                $body.removeClass('menu-open');
            }
        });

        // Close menu when clicking a link
        $mobileMenu.find('a').on('click', function() {
            $toggle.removeClass('active');
            $mobileMenu.removeClass('active');
            $body.removeClass('menu-open');
        });
    };

    // Smooth scroll for anchor links
    const initSmoothScroll = () => {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));

            if (target.length) {
                e.preventDefault();

                const headerHeight = $('.site-header').outerHeight();
                const targetPosition = target.offset().top - headerHeight - 20;

                $('html, body').animate({
                    scrollTop: targetPosition
                }, 800, 'swing');
            }
        });
    };

    // Video modal/player
    const initVideoPlayer = () => {
        const $videoEmbed = $('.video-embed');
        const $playButton = $('.play-button, .video-trigger');

        $playButton.on('click', function(e) {
            e.preventDefault();

            const $this = $(this);
            const $container = $this.closest('.video-embed, .video-wrapper');
            const videoId = $container.find('.video-embed').data('video-id') || $container.data('video-id');

            if (videoId) {
                const iframe = `<iframe
                    src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>`;

                $container.html(iframe);
            }
        });
    };

    // Testimonials slider
    const initTestimonialsSlider = () => {
        const $slider = $('.testimonials-slider');
        const $items = $slider.find('.testimonial-item');
        let currentIndex = 0;

        if ($items.length <= 1) {
            return;
        }

        const showTestimonial = (index) => {
            $items.removeClass('active');
            $items.eq(index).addClass('active');
        };

        // Auto rotate testimonials
        setInterval(() => {
            currentIndex = (currentIndex + 1) % $items.length;
            showTestimonial(currentIndex);
        }, 5000);
    };

    // Add to cart AJAX
    const initAddToCart = () => {
        $('.add-to-cart-btn').on('click', function(e) {
            e.preventDefault();

            const $btn = $(this);
            const productId = $btn.data('product-id');

            if (!productId) {
                return;
            }

            $btn.addClass('loading');

            $.ajax({
                url: comicArmor.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'comic_armor_add_to_cart',
                    product_id: productId,
                    quantity: 1,
                    nonce: comicArmor.nonce
                },
                success: function(response) {
                    if (response.success) {
                        // Update cart count
                        $('.cart-count').text(response.data.cart_count);

                        // Show success feedback
                        $btn.addClass('added');
                        setTimeout(() => {
                            $btn.removeClass('added');
                        }, 2000);
                    }
                },
                error: function() {
                    console.log('Error adding to cart');
                },
                complete: function() {
                    $btn.removeClass('loading');
                }
            });
        });
    };

    // Animate elements on scroll
    const initScrollAnimations = () => {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements
        document.querySelectorAll('.feature-card, .product-card, .step-item, .stat-item').forEach(el => {
            el.classList.add('animate-prepare');
            observer.observe(el);
        });
    };

    // Counter animation for stats
    const initCounterAnimation = () => {
        const counters = document.querySelectorAll('.stat-number');

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });

        function animateCounter(element) {
            const text = element.textContent;
            const hasPlus = text.includes('+');
            const hasPercent = text.includes('%');
            const hasStar = text.toLowerCase().includes('star');

            // Extract number
            const number = parseFloat(text.replace(/[^0-9.]/g, ''));

            if (isNaN(number) || hasStar) {
                return;
            }

            const duration = 2000;
            const steps = 60;
            const stepDuration = duration / steps;
            const increment = number / steps;
            let current = 0;

            const timer = setInterval(() => {
                current += increment;

                if (current >= number) {
                    current = number;
                    clearInterval(timer);
                }

                let displayValue = Math.floor(current);

                if (number >= 1000) {
                    displayValue = Math.floor(current / 1000) + 'K';
                }

                if (hasPercent) {
                    displayValue = current.toFixed(1) + '%';
                }

                if (hasPlus) {
                    displayValue += '+';
                }

                element.textContent = displayValue;
            }, stepDuration);
        }
    };

    // Back to top button
    const initBackToTop = () => {
        const $backToTop = $('<button class="back-to-top" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>');
        $('body').append($backToTop);

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 500) {
                $backToTop.addClass('visible');
            } else {
                $backToTop.removeClass('visible');
            }
        });

        $backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
        });
    };

    // Product quick view (basic implementation)
    const initQuickView = () => {
        // This would be expanded with a modal for full implementation
        $('.product-action-btn[title*="Quick View"]').on('click', function(e) {
            e.preventDefault();
            const productUrl = $(this).closest('.product-card').find('.product-title a').attr('href');
            if (productUrl) {
                window.location.href = productUrl;
            }
        });
    };

    // Initialize everything when DOM is ready
    $(document).ready(function() {
        initHeaderScroll();
        initMobileMenu();
        initSmoothScroll();
        initVideoPlayer();
        initTestimonialsSlider();
        initBackToTop();
        initQuickView();

        // Initialize AJAX add to cart if comicArmor object exists
        if (typeof comicArmor !== 'undefined') {
            initAddToCart();
        }

        // Initialize scroll animations
        if ('IntersectionObserver' in window) {
            initScrollAnimations();
            initCounterAnimation();
        }
    });

    // Run after full page load
    $(window).on('load', function() {
        // Remove loading state
        $('body').addClass('loaded');

        // Trigger scroll handler for initial state
        $(window).trigger('scroll');
    });

})(jQuery);
