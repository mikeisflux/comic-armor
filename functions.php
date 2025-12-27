<?php
/**
 * Comic Armor Theme Functions
 *
 * @package Comic_Armor
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme constants
define( 'COMIC_ARMOR_VERSION', '1.0.0' );
define( 'COMIC_ARMOR_DIR', get_template_directory() );
define( 'COMIC_ARMOR_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function comic_armor_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'comic-armor-hero', 1920, 1080, true );
    add_image_size( 'comic-armor-product', 600, 600, true );
    add_image_size( 'comic-armor-thumbnail', 400, 400, true );

    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'comic-armor' ),
        'footer'    => esc_html__( 'Footer Menu', 'comic-armor' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => '1a1f1a',
    ) );

    // WooCommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'comic_armor_setup' );

/**
 * Create default pages on theme activation
 */
function comic_armor_create_pages() {
    $pages = array(
        'about' => array(
            'title'    => 'About Us',
            'template' => 'page-about.php',
        ),
        'contact' => array(
            'title'    => 'Contact',
            'template' => 'page-contact.php',
        ),
        'faq' => array(
            'title'    => 'FAQ',
            'template' => 'page-faq.php',
        ),
        'shipping-info' => array(
            'title'    => 'Shipping Info',
            'template' => 'page-shipping-info.php',
        ),
        'returns' => array(
            'title'    => 'Returns Policy',
            'template' => 'page-returns.php',
        ),
    );

    foreach ( $pages as $slug => $page_data ) {
        // Check if page already exists
        $existing_page = get_page_by_path( $slug );

        if ( ! $existing_page ) {
            $page_id = wp_insert_post( array(
                'post_title'     => $page_data['title'],
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
            }
        }
    }
}
add_action( 'after_switch_theme', 'comic_armor_create_pages' );

// Also run on init to create any missing pages
add_action( 'init', 'comic_armor_create_pages', 20 );

/**
 * Fallback menu if no menu is set
 */
function comic_armor_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    if ( class_exists( 'WooCommerce' ) ) {
        echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">Shop</a></li>';
    }
    echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">About</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * Enqueue Scripts and Styles
 */
function comic_armor_scripts() {
    wp_enqueue_style(
        'comic-armor-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',
        array(),
        '6.4.2'
    );

    wp_enqueue_style(
        'comic-armor-style',
        get_stylesheet_uri(),
        array(),
        COMIC_ARMOR_VERSION
    );

    wp_enqueue_style(
        'comic-armor-custom',
        COMIC_ARMOR_URI . '/assets/css/custom.css',
        array( 'comic-armor-style' ),
        COMIC_ARMOR_VERSION
    );

    wp_enqueue_script(
        'comic-armor-main',
        COMIC_ARMOR_URI . '/assets/js/main.js',
        array( 'jquery' ),
        COMIC_ARMOR_VERSION,
        true
    );

    wp_enqueue_script(
        'comic-armor-slider',
        COMIC_ARMOR_URI . '/assets/js/slider.js',
        array( 'jquery' ),
        COMIC_ARMOR_VERSION,
        true
    );

    wp_localize_script( 'comic-armor-main', 'comicArmor', array(
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'comic-armor-nonce' ),
        'homeUrl'   => home_url(),
        'themeUrl'  => COMIC_ARMOR_URI,
    ) );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'comic_armor_scripts' );

/**
 * Register Widget Areas
 */
function comic_armor_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'comic-armor' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'comic-armor' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'comic-armor' ),
        'id'            => 'shop-sidebar',
        'description'   => esc_html__( 'Add widgets for shop pages.', 'comic-armor' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'comic-armor' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area.', 'comic-armor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'comic-armor' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area.', 'comic-armor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'comic-armor' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer widget area.', 'comic-armor' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'comic_armor_widgets_init' );

/**
 * Custom Theme Options (Customizer)
 */
function comic_armor_customize_register( $wp_customize ) {

    // Hero Section
    $wp_customize->add_section( 'comic_armor_hero', array(
        'title'       => __( 'Hero Slider', 'comic-armor' ),
        'priority'    => 30,
        'description' => __( 'Configure the hero slider on the front page.', 'comic-armor' ),
    ) );

    // Slide 1
    $wp_customize->add_setting( 'hero_slide_1_title', array(
        'default'           => 'COMIC ARMOR',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_1_title', array(
        'label'   => __( 'Slide 1 Title', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_1_subtitle', array(
        'default'           => 'Premium Comic Book Protection',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_1_subtitle', array(
        'label'   => __( 'Slide 1 Subtitle', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_1_description', array(
        'default'           => 'Defend your comics from damage during shipping. Military-grade protection for your valuable collection.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'hero_slide_1_description', array(
        'label'   => __( 'Slide 1 Description', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'hero_slide_1_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_slide_1_image', array(
        'label'   => __( 'Slide 1 Background Image', 'comic-armor' ),
        'section' => 'comic_armor_hero',
    ) ) );

    $wp_customize->add_setting( 'hero_slide_1_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'hero_slide_1_video', array(
        'label'       => __( 'Slide 1 Video URL (MP4)', 'comic-armor' ),
        'section'     => 'comic_armor_hero',
        'type'        => 'url',
        'description' => __( 'Optional: Add a video background for this slide.', 'comic-armor' ),
    ) );

    // Slide 2
    $wp_customize->add_setting( 'hero_slide_2_title', array(
        'default'           => 'BATTLE TESTED',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_2_title', array(
        'label'   => __( 'Slide 2 Title', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_2_subtitle', array(
        'default'           => 'Proven Protection',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_2_subtitle', array(
        'label'   => __( 'Slide 2 Subtitle', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_2_description', array(
        'default'           => 'Trusted by collectors and dealers worldwide. Your comics deserve the best defense.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'hero_slide_2_description', array(
        'label'   => __( 'Slide 2 Description', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'hero_slide_2_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_slide_2_image', array(
        'label'   => __( 'Slide 2 Background Image', 'comic-armor' ),
        'section' => 'comic_armor_hero',
    ) ) );

    $wp_customize->add_setting( 'hero_slide_2_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'hero_slide_2_video', array(
        'label'       => __( 'Slide 2 Video URL (MP4)', 'comic-armor' ),
        'section'     => 'comic_armor_hero',
        'type'        => 'url',
        'description' => __( 'Optional: Add a video for this slide.', 'comic-armor' ),
    ) );

    // Slide 3
    $wp_customize->add_setting( 'hero_slide_3_title', array(
        'default'           => 'SHOP NOW',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_3_title', array(
        'label'   => __( 'Slide 3 Title', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_3_subtitle', array(
        'default'           => 'Gear Up Today',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_slide_3_subtitle', array(
        'label'   => __( 'Slide 3 Subtitle', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_slide_3_description', array(
        'default'           => 'Get your Comic Armor now and ensure your shipments arrive in mint condition.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'hero_slide_3_description', array(
        'label'   => __( 'Slide 3 Description', 'comic-armor' ),
        'section' => 'comic_armor_hero',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'hero_slide_3_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_slide_3_image', array(
        'label'   => __( 'Slide 3 Background Image', 'comic-armor' ),
        'section' => 'comic_armor_hero',
    ) ) );

    $wp_customize->add_setting( 'hero_slide_3_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'hero_slide_3_video', array(
        'label'       => __( 'Slide 3 Video URL (MP4)', 'comic-armor' ),
        'section'     => 'comic_armor_hero',
        'type'        => 'url',
        'description' => __( 'Optional: Add a video for this slide.', 'comic-armor' ),
    ) );

    // About Section
    $wp_customize->add_section( 'comic_armor_about', array(
        'title'    => __( 'About Section', 'comic-armor' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'about_title', array(
        'default'           => 'OUR MISSION',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'about_title', array(
        'label'   => __( 'About Title', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'about_content', array(
        'default'           => 'Comic Armor was created by collectors, for collectors. We understand the frustration of receiving damaged comics in the mail. Our mission is to provide the ultimate protection for your valuable comics during shipping.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'about_content', array(
        'label'   => __( 'About Content', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image', array(
        'label'   => __( 'About Section Image', 'comic-armor' ),
        'section' => 'comic_armor_about',
    ) ) );

    // Stats
    $wp_customize->add_setting( 'stat_1_number', array(
        'default'           => '50K+',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_1_number', array(
        'label'   => __( 'Stat 1 Number', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_1_label', array(
        'default'           => 'Comics Protected',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_1_label', array(
        'label'   => __( 'Stat 1 Label', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_2_number', array(
        'default'           => '99.9%',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_2_number', array(
        'label'   => __( 'Stat 2 Number', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_2_label', array(
        'default'           => 'Success Rate',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_2_label', array(
        'label'   => __( 'Stat 2 Label', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_3_number', array(
        'default'           => '5 Star',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_3_number', array(
        'label'   => __( 'Stat 3 Number', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'stat_3_label', array(
        'default'           => 'Customer Rating',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'stat_3_label', array(
        'label'   => __( 'Stat 3 Label', 'comic-armor' ),
        'section' => 'comic_armor_about',
        'type'    => 'text',
    ) );

    // Promo Video Section
    $wp_customize->add_section( 'comic_armor_video', array(
        'title'    => __( 'Promo Video', 'comic-armor' ),
        'priority' => 36,
    ) );

    $wp_customize->add_setting( 'promo_video_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'promo_video_url', array(
        'label'       => __( 'YouTube/Vimeo Video URL', 'comic-armor' ),
        'section'     => 'comic_armor_video',
        'type'        => 'url',
        'description' => __( 'Enter the full URL to your promo video.', 'comic-armor' ),
    ) );

    $wp_customize->add_setting( 'promo_video_poster', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promo_video_poster', array(
        'label'   => __( 'Video Poster Image', 'comic-armor' ),
        'section' => 'comic_armor_video',
    ) ) );

    // Social Links
    $wp_customize->add_section( 'comic_armor_social', array(
        'title'    => __( 'Social Links', 'comic-armor' ),
        'priority' => 40,
    ) );

    $social_networks = array( 'facebook', 'twitter', 'instagram', 'youtube', 'tiktok' );

    foreach ( $social_networks as $network ) {
        $wp_customize->add_setting( 'social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'social_' . $network, array(
            'label'   => ucfirst( $network ) . ' URL',
            'section' => 'comic_armor_social',
            'type'    => 'url',
        ) );
    }
}
add_action( 'customize_register', 'comic_armor_customize_register' );

/**
 * Helper function to get featured products
 */
function comic_armor_get_featured_products( $limit = 4 ) {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return false;
    }

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'meta_key'       => '_price',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        ),
    );

    $products = new WP_Query( $args );

    if ( ! $products->have_posts() ) {
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
            'meta_key'       => '_price',
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
        );
        $products = new WP_Query( $args );
    }

    return $products;
}

/**
 * Custom excerpt length
 */
function comic_armor_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'comic_armor_excerpt_length' );

/**
 * Custom excerpt more
 */
function comic_armor_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'comic_armor_excerpt_more' );

/**
 * Add body classes
 */
function comic_armor_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }

    if ( class_exists( 'WooCommerce' ) ) {
        if ( is_shop() || is_product_category() || is_product_tag() ) {
            $classes[] = 'shop-page';
        }
        if ( is_product() ) {
            $classes[] = 'single-product-page';
        }
    }

    return $classes;
}
add_filter( 'body_class', 'comic_armor_body_classes' );

/**
 * Include template parts - check if files exist first
 */
$template_tags = COMIC_ARMOR_DIR . '/inc/template-tags.php';
$template_functions = COMIC_ARMOR_DIR . '/inc/template-functions.php';

if ( file_exists( $template_tags ) ) {
    require_once $template_tags;
}

if ( file_exists( $template_functions ) ) {
    require_once $template_functions;
}

/**
 * WooCommerce template hooks
 */
if ( class_exists( 'WooCommerce' ) ) {
    // Remove default WooCommerce styles - we use our own
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

    $woo_functions = COMIC_ARMOR_DIR . '/inc/woocommerce-functions.php';
    if ( file_exists( $woo_functions ) ) {
        require_once $woo_functions;
    }
}

/**
 * Admin notice for WooCommerce
 */
function comic_armor_admin_notice() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        echo '<div class="notice notice-warning"><p>';
        esc_html_e( 'Comic Armor theme recommends installing WooCommerce for full e-commerce functionality.', 'comic-armor' );
        echo '</p></div>';
    }
}
add_action( 'admin_notices', 'comic_armor_admin_notice' );
