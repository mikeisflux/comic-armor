<?php
/**
 * Front Page Template
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main front-page-main">

    <!-- Hero Slider Section -->
    <section class="hero-slider camo-overlay">
        <div class="slider-wrapper">
            <?php
            // Slide data
            // Get video URL for first slide (blank by default)
            $video_slide_url = get_theme_mod( 'hero_slide_video_url', '' );

            $slides = array(
                1 => array(
                    'title'       => get_theme_mod( 'hero_slide_video_title', '' ),
                    'subtitle'    => get_theme_mod( 'hero_slide_video_subtitle', '' ),
                    'description' => get_theme_mod( 'hero_slide_video_description', '' ),
                    'image'       => get_theme_mod( 'hero_slide_video_image', '' ),
                    'video'       => $video_slide_url,
                    'is_video_slide' => true,
                    'btn1_text'   => '',
                    'btn1_icon'   => '',
                    'btn1_url'    => '',
                    'btn2_text'   => '',
                    'btn2_icon'   => '',
                    'btn2_url'    => '',
                ),
                2 => array(
                    'title'       => get_theme_mod( 'hero_slide_1_title', 'COMIC ARMOR' ),
                    'subtitle'    => get_theme_mod( 'hero_slide_1_subtitle', 'Premium Comic Book Protection' ),
                    'description' => get_theme_mod( 'hero_slide_1_description', 'Defend your comics from damage during shipping. Military-grade protection for your valuable collection.' ),
                    'image'       => get_theme_mod( 'hero_slide_1_image', '' ),
                    'video'       => get_theme_mod( 'hero_slide_1_video', '' ),
                    'btn1_text'   => 'Shop Now',
                    'btn1_icon'   => 'fa-arrow-right',
                    'btn1_url'    => class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#products',
                    'btn2_text'   => 'Watch Demo',
                    'btn2_icon'   => 'fa-play',
                    'btn2_url'    => '#video-section',
                ),
                3 => array(
                    'title'       => get_theme_mod( 'hero_slide_2_title', 'BATTLE TESTED' ),
                    'subtitle'    => get_theme_mod( 'hero_slide_2_subtitle', 'Proven Protection' ),
                    'description' => get_theme_mod( 'hero_slide_2_description', 'Trusted by collectors and dealers worldwide. Your comics deserve the best defense.' ),
                    'image'       => get_theme_mod( 'hero_slide_2_image', '' ),
                    'video'       => get_theme_mod( 'hero_slide_2_video', '' ),
                    'btn1_text'   => 'Learn More',
                    'btn1_icon'   => 'fa-arrow-right',
                    'btn1_url'    => '#about-section',
                    'btn2_text'   => 'Reviews',
                    'btn2_icon'   => 'fa-star',
                    'btn2_url'    => '#testimonials',
                ),
                4 => array(
                    'title'       => get_theme_mod( 'hero_slide_3_title', 'SHOP NOW' ),
                    'subtitle'    => get_theme_mod( 'hero_slide_3_subtitle', 'Gear Up Today' ),
                    'description' => get_theme_mod( 'hero_slide_3_description', 'Get your Comic Armor now and ensure your shipments arrive in mint condition.' ),
                    'image'       => get_theme_mod( 'hero_slide_3_image', '' ),
                    'video'       => get_theme_mod( 'hero_slide_3_video', '' ),
                    'btn1_text'   => 'Browse Products',
                    'btn1_icon'   => 'fa-shopping-cart',
                    'btn1_url'    => class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#products',
                    'btn2_text'   => '',
                    'btn2_icon'   => '',
                    'btn2_url'    => '',
                ),
            );

            foreach ( $slides as $num => $slide ) :
                $is_active = ( $num === 1 ) ? 'active' : '';
                $has_video = ! empty( $slide['video'] );
                $is_video_slide = isset( $slide['is_video_slide'] ) && $slide['is_video_slide'];

                // Check if video is YouTube/Vimeo
                $is_youtube = $has_video && ( strpos( $slide['video'], 'youtube.com' ) !== false || strpos( $slide['video'], 'youtu.be' ) !== false );
                $youtube_id = '';
                if ( $is_youtube ) {
                    preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $slide['video'], $matches );
                    $youtube_id = isset( $matches[1] ) ? $matches[1] : '';
                }
            ?>
            <!-- Slide <?php echo esc_attr( $num ); ?> -->
            <?php if ( $is_video_slide ) : ?>
                <!-- Video Slide - Foreground Video with Background -->
                <div class="slide video-slide <?php echo esc_attr( $is_active ); ?>" data-slide="<?php echo esc_attr( $num ); ?>">
                    <div class="slide-background" style="background-image: url('<?php echo esc_url( $slide['image'] ); ?>');"></div>
                    <div class="video-slide-container">
                        <?php if ( $has_video && $is_youtube && $youtube_id ) : ?>
                            <div class="foreground-video-wrapper">
                                <iframe
                                    src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>?autoplay=1&loop=1&playlist=<?php echo esc_attr( $youtube_id ); ?>&rel=0&modestbranding=1&playsinline=1&enablejsapi=1"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen
                                    class="foreground-video-iframe">
                                </iframe>
                            </div>
                        <?php elseif ( $has_video ) : ?>
                            <div class="foreground-video-wrapper">
                                <video class="foreground-video" loop playsinline autoplay controls preload="metadata">
                                    <source src="<?php echo esc_url( $slide['video'] ); ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php else : ?>
                            <!-- Blank slide - no video configured -->
                            <div class="video-slide-placeholder">
                                <p><?php esc_html_e( 'Video not configured. Add a video URL in the Customizer.', 'comic-armor' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <!-- Regular Slide -->
                <div class="slide <?php echo esc_attr( $is_active ); ?>" data-slide="<?php echo esc_attr( $num ); ?>">
                    <div class="slide-background" style="background-image: url('<?php echo esc_url( $slide['image'] ); ?>');">
                        <?php if ( $has_video && $is_youtube && $youtube_id ) : ?>
                            <div class="slide-youtube-video" data-video-id="<?php echo esc_attr( $youtube_id ); ?>">
                                <iframe
                                    src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr( $youtube_id ); ?>&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1&enablejsapi=1"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen
                                    class="slide-video-iframe">
                                </iframe>
                            </div>
                        <?php elseif ( $has_video ) : ?>
                            <video class="slide-video" muted loop playsinline autoplay preload="metadata">
                                <source src="<?php echo esc_url( $slide['video'] ); ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </div>
                    <div class="slide-content">
                        <span class="slide-subtitle <?php echo $num === 1 ? 'animate-fadeInUp' : ''; ?>">
                            <?php echo esc_html( $slide['subtitle'] ); ?>
                        </span>
                        <h1 class="slide-title <?php echo $num === 1 ? 'animate-fadeInUp animate-delay-1' : ''; ?>">
                            <?php
                            $words = explode( ' ', $slide['title'] );
                            if ( count( $words ) > 1 ) {
                                echo esc_html( $words[0] ) . ' <span>' . esc_html( implode( ' ', array_slice( $words, 1 ) ) ) . '</span>';
                            } else {
                                echo '<span>' . esc_html( $slide['title'] ) . '</span>';
                            }
                            ?>
                        </h1>
                        <p class="slide-description <?php echo $num === 1 ? 'animate-fadeInUp animate-delay-2' : ''; ?>">
                            <?php echo esc_html( $slide['description'] ); ?>
                        </p>
                        <div class="slide-buttons <?php echo $num === 1 ? 'animate-fadeInUp animate-delay-3' : ''; ?>">
                            <?php if ( ! empty( $slide['btn1_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['btn1_url'] ); ?>" class="btn btn-primary">
                                <?php echo esc_html( $slide['btn1_text'] ); ?> <i class="fas <?php echo esc_attr( $slide['btn1_icon'] ); ?> btn-icon"></i>
                            </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $slide['btn2_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $slide['btn2_url'] ); ?>" class="btn btn-outline">
                                    <i class="fas <?php echo esc_attr( $slide['btn2_icon'] ); ?> btn-icon"></i> <?php echo esc_html( $slide['btn2_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Slider Navigation Dots -->
        <div class="slider-nav">
            <button class="slider-dot active" data-slide="1" aria-label="Slide 1"></button>
            <button class="slider-dot" data-slide="2" aria-label="Slide 2"></button>
            <button class="slider-dot" data-slide="3" aria-label="Slide 3"></button>
            <button class="slider-dot" data-slide="4" aria-label="Slide 4"></button>
        </div>

        <!-- Slider Arrows -->
        <div class="slider-arrows">
            <button class="slider-arrow prev" aria-label="Previous Slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-arrow next" aria-label="Next Slide">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section section-dark features-section">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e( 'Why Choose Us', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Military-Grade', 'comic-armor' ); ?> <span><?php esc_html_e( 'Protection', 'comic-armor' ); ?></span></h2>
                <p class="section-description"><?php esc_html_e( 'Our Comic Armor inserts are designed to provide the ultimate protection for your valuable comics during shipping.', 'comic-armor' ); ?></p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e( 'Impact Resistant', 'comic-armor' ); ?></h3>
                    <p class="feature-description"><?php esc_html_e( 'Heavy-duty construction absorbs shocks and impacts during transit, keeping your comics safe from dings and dents.', 'comic-armor' ); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-compress-arrows-alt"></i>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e( 'Bend Prevention', 'comic-armor' ); ?></h3>
                    <p class="feature-description"><?php esc_html_e( 'Rigid backing board prevents corner bends and spine damage that can ruin a comic\'s grade instantly.', 'comic-armor' ); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tint-slash"></i>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e( 'Water Resistant', 'comic-armor' ); ?></h3>
                    <p class="feature-description"><?php esc_html_e( 'Moisture-resistant materials protect against water damage from rain, humidity, and unexpected spills.', 'comic-armor' ); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e( 'Lightweight Design', 'comic-armor' ); ?></h3>
                    <p class="feature-description"><?php esc_html_e( 'Adds minimal weight to your shipment, keeping shipping costs low while maximizing protection.', 'comic-armor' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="section products-section">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e( 'Our Products', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Gear', 'comic-armor' ); ?> <span><?php esc_html_e( 'Up', 'comic-armor' ); ?></span></h2>
                <p class="section-description"><?php esc_html_e( 'Choose the protection level that fits your needs. From single comics to bulk shipments.', 'comic-armor' ); ?></p>
            </div>

            <div class="products-grid">
                <?php
                if ( class_exists( 'WooCommerce' ) ) :
                    $products = comic_armor_get_featured_products( 4 );

                    if ( $products->have_posts() ) :
                        while ( $products->have_posts() ) :
                            $products->the_post();
                            global $product;
                            ?>
                            <div class="product-card">
                                <div class="product-image">
                                    <?php if ( $product->is_on_sale() ) : ?>
                                        <span class="product-badge sale"><?php esc_html_e( 'Sale', 'comic-armor' ); ?></span>
                                    <?php elseif ( $product->is_featured() ) : ?>
                                        <span class="product-badge new"><?php esc_html_e( 'Featured', 'comic-armor' ); ?></span>
                                    <?php endif; ?>

                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'comic-armor-product' ); ?>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url( wc_placeholder_img_src( 'comic-armor-product' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    <?php endif; ?>

                                    <div class="product-actions">
                                        <button class="product-action-btn add-to-cart-btn" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" title="<?php esc_attr_e( 'Add to Cart', 'comic-armor' ); ?>">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <a href="<?php the_permalink(); ?>" class="product-action-btn" title="<?php esc_attr_e( 'View Product', 'comic-armor' ); ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                else :
                    // Static product placeholders when WooCommerce is not active
                    $placeholder_products = array(
                        array(
                            'title'    => 'Comic Armor - Single Pack',
                            'price'    => '$4.99',
                            'category' => 'Protection',
                            'badge'    => '',
                        ),
                        array(
                            'title'    => 'Comic Armor - 10 Pack',
                            'price'    => '$39.99',
                            'old_price' => '$49.99',
                            'category' => 'Protection',
                            'badge'    => 'sale',
                        ),
                        array(
                            'title'    => 'Comic Armor - 25 Pack',
                            'price'    => '$89.99',
                            'category' => 'Protection',
                            'badge'    => 'new',
                        ),
                        array(
                            'title'    => 'Comic Armor - 50 Pack',
                            'price'    => '$159.99',
                            'category' => 'Bulk',
                            'badge'    => '',
                        ),
                    );

                    foreach ( $placeholder_products as $product ) :
                        ?>
                        <div class="product-card">
                            <div class="product-image">
                                <?php if ( ! empty( $product['badge'] ) ) : ?>
                                    <span class="product-badge <?php echo esc_attr( $product['badge'] ); ?>">
                                        <?php echo esc_html( ucfirst( $product['badge'] ) ); ?>
                                    </span>
                                <?php endif; ?>
                                <img src="<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/product-placeholder.jpg' ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>">
                                <div class="product-actions">
                                    <button class="product-action-btn" title="<?php esc_attr_e( 'Add to Cart', 'comic-armor' ); ?>">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    <button class="product-action-btn" title="<?php esc_attr_e( 'Quick View', 'comic-armor' ); ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="product-category"><?php echo esc_html( $product['category'] ); ?></span>
                                <h3 class="product-title">
                                    <a href="#"><?php echo esc_html( $product['title'] ); ?></a>
                                </h3>
                                <div class="product-price">
                                    <?php if ( ! empty( $product['old_price'] ) ) : ?>
                                        <del><?php echo esc_html( $product['old_price'] ); ?></del>
                                    <?php endif; ?>
                                    <ins><?php echo esc_html( $product['price'] ); ?></ins>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>

            <div class="text-center mt-3">
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'View All Products', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section how-it-works">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e( 'Simple Process', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'How It', 'comic-armor' ); ?> <span><?php esc_html_e( 'Works', 'comic-armor' ); ?></span></h2>
                <p class="section-description"><?php esc_html_e( 'Protecting your comics is easy with Comic Armor. Just follow these simple steps.', 'comic-armor' ); ?></p>
            </div>

            <div class="steps-container">
                <div class="step-item">
                    <div class="step-number">01</div>
                    <h3 class="step-title"><?php esc_html_e( 'Bag & Board', 'comic-armor' ); ?></h3>
                    <p class="step-description"><?php esc_html_e( 'Place your comic in a bag with a standard backing board as usual.', 'comic-armor' ); ?></p>
                </div>

                <div class="step-item">
                    <div class="step-number">02</div>
                    <h3 class="step-title"><?php esc_html_e( 'Insert Armor', 'comic-armor' ); ?></h3>
                    <p class="step-description"><?php esc_html_e( 'Slide the bagged comic between the Comic Armor protective panels.', 'comic-armor' ); ?></p>
                </div>

                <div class="step-item">
                    <div class="step-number">03</div>
                    <h3 class="step-title"><?php esc_html_e( 'Seal & Ship', 'comic-armor' ); ?></h3>
                    <p class="step-description"><?php esc_html_e( 'Place in your mailer and seal. Your comic is now battle-ready for shipping.', 'comic-armor' ); ?></p>
                </div>

                <div class="step-item">
                    <div class="step-number">04</div>
                    <h3 class="step-title"><?php esc_html_e( 'Arrive Mint', 'comic-armor' ); ?></h3>
                    <p class="step-description"><?php esc_html_e( 'Your comic arrives in pristine condition, ready to be graded or enjoyed.', 'comic-armor' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- About/Mission Section -->
    <section id="about-section" class="section section-dark about-section camo-overlay">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <?php
                    $about_image = get_theme_mod( 'about_image' );
                    if ( $about_image ) :
                    ?>
                        <img src="<?php echo esc_url( $about_image ); ?>" alt="<?php esc_attr_e( 'About Comic Armor', 'comic-armor' ); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/about-image.jpg' ); ?>" alt="<?php esc_attr_e( 'About Comic Armor', 'comic-armor' ); ?>">
                    <?php endif; ?>
                </div>
                <div class="about-content">
                    <span class="section-subtitle"><?php esc_html_e( 'Our Mission', 'comic-armor' ); ?></span>
                    <h2><?php echo esc_html( get_theme_mod( 'about_title', 'PROTECTING WHAT MATTERS' ) ); ?></h2>
                    <p><?php echo esc_html( get_theme_mod( 'about_content', 'Comic Armor was created by collectors, for collectors. We understand the frustration of receiving damaged comics in the mail. Our mission is to provide the ultimate protection for your valuable comics during shipping.' ) ); ?></p>
                    <p><?php esc_html_e( 'Every Comic Armor insert is designed with military precision to absorb impacts, prevent bends, and keep your comics in mint condition from departure to delivery.', 'comic-armor' ); ?></p>

                    <div class="about-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?php echo esc_html( get_theme_mod( 'stat_1_number', '50K+' ) ); ?></div>
                            <div class="stat-label"><?php echo esc_html( get_theme_mod( 'stat_1_label', 'Comics Protected' ) ); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo esc_html( get_theme_mod( 'stat_2_number', '99.9%' ) ); ?></div>
                            <div class="stat-label"><?php echo esc_html( get_theme_mod( 'stat_2_label', 'Success Rate' ) ); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo esc_html( get_theme_mod( 'stat_3_number', '5 Star' ) ); ?></div>
                            <div class="stat-label"><?php echo esc_html( get_theme_mod( 'stat_3_label', 'Customer Rating' ) ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video-section" class="section section-medium video-section">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e( 'See It In Action', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Watch', 'comic-armor' ); ?> <span><?php esc_html_e( 'Demo', 'comic-armor' ); ?></span></h2>
            </div>

            <div class="video-container">
                <div class="video-wrapper">
                    <?php
                    $video_url = get_theme_mod( 'promo_video_url' );
                    $poster    = get_theme_mod( 'promo_video_poster' );

                    if ( $video_url ) :
                        // Convert YouTube/Vimeo URLs to embed
                        if ( strpos( $video_url, 'youtube.com' ) !== false || strpos( $video_url, 'youtu.be' ) !== false ) :
                            preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches );
                            $video_id = isset( $matches[1] ) ? $matches[1] : '';
                            ?>
                            <div class="video-embed" data-video-id="<?php echo esc_attr( $video_id ); ?>">
                                <div class="video-poster" style="background-image: url('<?php echo esc_url( $poster ? $poster : 'https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg' ); ?>');">
                                    <button class="play-button" aria-label="<?php esc_attr_e( 'Play Video', 'comic-armor' ); ?>">
                                        <i class="fas fa-play"></i>
                                    </button>
                                </div>
                            </div>
                            <?php
                        endif;
                    else :
                        // Placeholder
                        ?>
                        <div class="video-placeholder" style="background-image: url('<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/video-poster.jpg' ); ?>');">
                            <button class="play-button" aria-label="<?php esc_attr_e( 'Play Video', 'comic-armor' ); ?>">
                                <i class="fas fa-play"></i>
                            </button>
                            <p class="video-note"><?php esc_html_e( 'Add your promo video URL in the Customizer', 'comic-armor' ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section testimonials-section camo-overlay">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e( 'Testimonials', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'What Collectors', 'comic-armor' ); ?> <span><?php esc_html_e( 'Say', 'comic-armor' ); ?></span></h2>
            </div>

            <div class="testimonials-slider">
                <div class="testimonial-item active">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-content">
                        <?php esc_html_e( 'I\'ve shipped over 500 comics with Comic Armor and not a single one has arrived damaged. This is an absolute game-changer for serious collectors and dealers.', 'comic-armor' ); ?>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/testimonial-1.jpg' ); ?>" alt="Mike R." class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>Mike R.</h4>
                            <span><?php esc_html_e( 'Comic Dealer, eBay Top Seller', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-content">
                        <?php esc_html_e( 'Finally, a product that takes comic protection seriously. The military-grade quality is evident. My CGC submissions arrive in perfect condition every time.', 'comic-armor' ); ?>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/testimonial-2.jpg' ); ?>" alt="Sarah T." class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>Sarah T.</h4>
                            <span><?php esc_html_e( 'Comic Collector, 15+ Years', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-content">
                        <?php esc_html_e( 'As a comic store owner, customer satisfaction is everything. Since switching to Comic Armor, damage claims have dropped to zero. Worth every penny.', 'comic-armor' ); ?>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo esc_url( COMIC_ARMOR_URI . '/assets/images/testimonial-3.jpg' ); ?>" alt="James L." class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>James L.</h4>
                            <span><?php esc_html_e( 'Comic Store Owner', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section camo-pattern">
        <div class="container">
            <div class="cta-content">
                <h2><?php esc_html_e( 'READY TO PROTECT YOUR COLLECTION?', 'comic-armor' ); ?></h2>
                <p><?php esc_html_e( 'Join thousands of collectors who trust Comic Armor to keep their comics safe during shipping.', 'comic-armor' ); ?></p>
                <div class="slide-buttons">
                    <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary">
                            <?php esc_html_e( 'Shop Now', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                        </a>
                    <?php else : ?>
                        <a href="#products" class="btn btn-primary">
                            <?php esc_html_e( 'Shop Now', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">
                        <?php esc_html_e( 'Contact Us', 'comic-armor' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
