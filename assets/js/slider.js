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
            this.isVideoPlaying = false;

            this.init();
        }

        init() {
            this.bindEvents();
            this.initVideos();
            this.startAutoplay();
        }

        initVideos() {
            // Find all video slides and set up play buttons
            this.$slides.each((index, slide) => {
                const $slide = $(slide);
                const $video = $slide.find('.slide-video');
                const $youtubeVideo = $slide.find('.slide-youtube-video');
                const $playBtn = $slide.find('.video-play-btn');

                // Handle native video elements with play buttons
                if ($video.length && $playBtn.length) {
                    // Click play button to start video
                    $playBtn.on('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        this.playVideo($slide, $video, $playBtn);
                    });

                    // Video ended - reset
                    $video[0].addEventListener('ended', () => {
                        this.resetVideo($slide, $video, $playBtn);
                    });

                    // Click video to pause
                    $video.on('click', () => {
                        if (!$video[0].paused) {
                            this.pauseVideo($slide, $video, $playBtn);
                        }
                    });
                }

                // Handle autoplay native videos (no play button)
                if ($video.length && !$playBtn.length) {
                    // Start playing when slide becomes active
                    if ($slide.hasClass('active')) {
                        $video[0].play().catch(() => {});
                    }
                }

                // YouTube videos autoplay with sound - just track for slide changes
                if ($youtubeVideo.length) {
                    $slide.addClass('has-youtube-video');
                }
            });

            // Handle foreground video slides (video slide with foreground video)
            this.initForegroundVideoSlide();
        }

        initForegroundVideoSlide() {
            const $videoSlide = this.$slider.find('.video-slide');
            if (!$videoSlide.length) return;

            const $foregroundVideo = $videoSlide.find('.foreground-video');
            const $foregroundIframe = $videoSlide.find('.foreground-video-iframe');

            // Handle native foreground video ended
            if ($foregroundVideo.length) {
                $foregroundVideo[0].addEventListener('ended', () => {
                    this.nextSlide();
                });
            }

            // Handle YouTube iframe - listen for YouTube API messages
            if ($foregroundIframe.length) {
                // Listen for YouTube player state changes
                window.addEventListener('message', (event) => {
                    if (event.origin !== 'https://www.youtube.com') return;

                    try {
                        const data = JSON.parse(event.data);
                        // Check if video ended (state 0 = ended)
                        if (data.event === 'onStateChange' && data.info === 0) {
                            this.nextSlide();
                        }
                    } catch (e) {
                        // Not a JSON message, ignore
                    }
                });
            }
        }

        playVideo($slide, $video, $playBtn) {
            const video = $video[0];

            // Play from beginning
            video.currentTime = 0;
            video.play();

            // Update UI
            $slide.addClass('video-playing');
            $playBtn.addClass('hidden');
            this.isVideoPlaying = true;

            // Stop autoplay while video plays
            this.stopAutoplay();
        }

        pauseVideo($slide, $video, $playBtn) {
            const video = $video[0];

            video.pause();
            $slide.removeClass('video-playing');
            $playBtn.removeClass('hidden');
            this.isVideoPlaying = false;

            // Resume autoplay
            this.startAutoplay();
        }

        resetVideo($slide, $video, $playBtn) {
            const video = $video[0];

            video.currentTime = 0;
            $slide.removeClass('video-playing');
            $playBtn.removeClass('hidden');
            this.isVideoPlaying = false;

            // Resume autoplay
            this.startAutoplay();
        }

        stopAllVideos() {
            this.$slides.each((index, slide) => {
                const $slide = $(slide);
                const $video = $slide.find('.slide-video');
                const $youtubeVideo = $slide.find('.slide-youtube-video');
                const $playBtn = $slide.find('.video-play-btn');

                // Stop native videos
                if ($video.length) {
                    const video = $video[0];
                    video.pause();
                    video.currentTime = 0;
                    $slide.removeClass('video-playing');
                    if ($playBtn.length) {
                        $playBtn.removeClass('hidden');
                    }
                }

                // Reset YouTube iframes by reloading src (this restarts them)
                if ($youtubeVideo.length) {
                    const $iframe = $youtubeVideo.find('iframe');
                    if ($iframe.length) {
                        const src = $iframe.attr('src');
                        $iframe.attr('src', src);
                    }
                }
            });
            this.isVideoPlaying = false;
        }

        // Play videos on the active slide
        playActiveSlideVideos() {
            const $activeSlide = this.$slides.eq(this.currentSlide);
            const $video = $activeSlide.find('.slide-video');
            const $playBtn = $activeSlide.find('.video-play-btn');

            // Play native autoplay videos (those without play buttons)
            if ($video.length && !$playBtn.length) {
                $video[0].play().catch(() => {});
            }
        }

        // Pause videos on inactive slides
        pauseInactiveSlideVideos() {
            this.$slides.each((index, slide) => {
                if (index === this.currentSlide) return;

                const $slide = $(slide);
                const $video = $slide.find('.slide-video');

                if ($video.length) {
                    $video[0].pause();
                }
            });
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
                if (this.isSliderInView() && !this.isVideoPlaying) {
                    if (e.key === 'ArrowLeft') {
                        this.prevSlide();
                    } else if (e.key === 'ArrowRight') {
                        this.nextSlide();
                    }
                }
                // Escape to stop video
                if (e.key === 'Escape' && this.isVideoPlaying) {
                    this.stopAllVideos();
                    this.startAutoplay();
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
                if (!this.isVideoPlaying) {
                    this.handleSwipe(touchStartX, touchEndX);
                }
            });

            // Pause autoplay on hover (but not during video)
            this.$slider.on('mouseenter', () => {
                if (!this.isVideoPlaying) {
                    this.stopAutoplay();
                }
            });

            this.$slider.on('mouseleave', () => {
                if (!this.isVideoPlaying) {
                    this.startAutoplay();
                }
            });

            // Pause when tab is not visible
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.stopAutoplay();
                    this.stopAllVideos();
                } else if (!this.isVideoPlaying) {
                    this.startAutoplay();
                }
            });
        }

        goToSlide(index) {
            if (this.isAnimating || index === this.currentSlide) {
                return;
            }

            // Pause videos on current slide before switching
            this.pauseInactiveSlideVideos();

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

            // Play videos on the new active slide
            this.playActiveSlideVideos();

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
            if (this.autoplayInterval || this.isVideoPlaying) {
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
            if (!this.isVideoPlaying) {
                this.startAutoplay();
            }
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
