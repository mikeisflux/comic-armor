<?php
/**
 * 404 Page Template
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header camo-pattern camo-overlay">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'comic-armor' ); ?></h1>
        </div>
    </div>

    <div class="container py-3">
        <section class="error-404">
            <h1>404</h1>
            <h2><?php esc_html_e( 'Target Not Acquired', 'comic-armor' ); ?></h2>
            <p><?php esc_html_e( 'The page you\'re looking for seems to have gone AWOL. Let\'s get you back on track.', 'comic-armor' ); ?></p>

            <div class="error-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-home btn-icon"></i> <?php esc_html_e( 'Return to Base', 'comic-armor' ); ?>
                </a>
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-outline btn-dark">
                        <i class="fas fa-shopping-cart btn-icon"></i> <?php esc_html_e( 'Visit Shop', 'comic-armor' ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
