<?php
/**
 * Single Post Template
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
            <div class="entry-meta">
                <span class="posted-on">
                    <i class="fas fa-calendar-alt"></i>
                    <?php echo get_the_date(); ?>
                </span>
                <span class="posted-by">
                    <i class="fas fa-user"></i>
                    <?php the_author(); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'comic-armor' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $tags_list = get_the_tag_list( '', ', ' );
                    if ( $tags_list ) {
                        printf( '<span class="tags-links"><i class="fas fa-tags"></i> %s</span>', $tags_list );
                    }
                    ?>
                </footer>
            </article>

            <?php
            // Post navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle"><i class="fas fa-chevron-left"></i> ' . esc_html__( 'Previous', 'comic-armor' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'comic-armor' ) . ' <i class="fas fa-chevron-right"></i></span> <span class="nav-title">%title</span>',
            ) );

            // Comments
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
