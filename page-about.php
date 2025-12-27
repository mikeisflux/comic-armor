<?php
/**
 * Template Name: About Us
 * Template for the About Us page
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <!-- Page Header -->
    <section class="page-hero camo-pattern camo-overlay">
        <div class="container">
            <span class="page-subtitle"><?php esc_html_e( 'Our Story', 'comic-armor' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'About', 'comic-armor' ); ?> <span><?php esc_html_e( 'Comic Armor', 'comic-armor' ); ?></span></h1>
            <p class="page-description"><?php esc_html_e( 'Military-grade protection born from a collector\'s passion.', 'comic-armor' ); ?></p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section about-mission">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <span class="section-subtitle"><?php esc_html_e( 'Our Mission', 'comic-armor' ); ?></span>
                    <h2 class="section-title"><?php esc_html_e( 'Protecting What', 'comic-armor' ); ?> <span><?php esc_html_e( 'Matters', 'comic-armor' ); ?></span></h2>
                    <p><?php esc_html_e( 'Comic Armor was founded by collectors, for collectors. We understand the frustration of receiving a long-awaited comic only to find it damaged in transit. That\'s why we developed military-grade protection solutions that ensure your valuable comics arrive in mint condition, every time.', 'comic-armor' ); ?></p>
                    <p><?php esc_html_e( 'Our products are designed with the same precision and durability standards used in military applications. We don\'t just protect comics - we protect your investment, your passion, and your peace of mind.', 'comic-armor' ); ?></p>
                </div>
                <div class="about-stats">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="stat-number">100%</div>
                        <div class="stat-label"><?php esc_html_e( 'Protection Rate', 'comic-armor' ); ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-number">10K+</div>
                        <div class="stat-label"><?php esc_html_e( 'Happy Collectors', 'comic-armor' ); ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-book"></i></div>
                        <div class="stat-number">500K+</div>
                        <div class="stat-label"><?php esc_html_e( 'Comics Protected', 'comic-armor' ); ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-star"></i></div>
                        <div class="stat-number">5.0</div>
                        <div class="stat-label"><?php esc_html_e( 'Customer Rating', 'comic-armor' ); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section about-values">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle"><?php esc_html_e( 'What We Stand For', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Our', 'comic-armor' ); ?> <span><?php esc_html_e( 'Values', 'comic-armor' ); ?></span></h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-medal"></i></div>
                    <h3><?php esc_html_e( 'Quality First', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'We never compromise on materials or construction. Every Comic Armor product meets our rigorous quality standards.', 'comic-armor' ); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-heart"></i></div>
                    <h3><?php esc_html_e( 'Collector Passion', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'We\'re collectors ourselves. We treat every comic like it\'s a grail book because we know it might be yours.', 'comic-armor' ); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-handshake"></i></div>
                    <h3><?php esc_html_e( 'Customer Trust', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'Your satisfaction is our priority. We stand behind every product with our protection guarantee.', 'comic-armor' ); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-leaf"></i></div>
                    <h3><?php esc_html_e( 'Sustainability', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'Our products are designed to be reusable, reducing waste while providing superior protection.', 'comic-armor' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section about-cta camo-pattern camo-overlay">
        <div class="container text-center">
            <h2 class="section-title"><?php esc_html_e( 'Ready to Protect Your', 'comic-armor' ); ?> <span><?php esc_html_e( 'Collection?', 'comic-armor' ); ?></span></h2>
            <p><?php esc_html_e( 'Join thousands of collectors who trust Comic Armor for their shipping protection needs.', 'comic-armor' ); ?></p>
            <div class="cta-buttons">
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Shop Now', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                    </a>
                <?php endif; ?>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'Contact Us', 'comic-armor' ); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
