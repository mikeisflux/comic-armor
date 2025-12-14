<?php
/**
 * Page Template
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
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </div>
    </div>

    <div class="container py-3">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'comic-armor' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
