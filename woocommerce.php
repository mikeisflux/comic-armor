<?php
/**
 * WooCommerce Template
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main woocommerce-page">
    <div class="page-header camo-pattern camo-overlay">
        <div class="container">
            <?php if ( is_shop() ) : ?>
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
                <p class="page-subtitle"><?php esc_html_e( 'Military-Grade Comic Protection', 'comic-armor' ); ?></p>
            <?php elseif ( is_product_category() || is_product_tag() ) : ?>
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
                <?php
                $term = get_queried_object();
                if ( $term && ! empty( $term->description ) ) :
                    ?>
                    <p class="page-subtitle"><?php echo esc_html( $term->description ); ?></p>
                <?php endif; ?>
            <?php elseif ( is_product() ) : ?>
                <h1 class="page-title"><?php the_title(); ?></h1>
            <?php else : ?>
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>
        </div>
    </div>

    <div class="woocommerce-content-wrapper">
        <?php woocommerce_content(); ?>
    </div>
</main>

<?php
get_footer();
