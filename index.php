<?php
/**
 * Main Template
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
            <h1 class="page-title"><?php esc_html_e( 'Latest Posts', 'comic-armor' ); ?></h1>
        </div>
    </div>

    <div class="container py-3">
        <?php if ( have_posts() ) : ?>
            <div class="posts-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-dark">
                                <?php esc_html_e( 'Read More', 'comic-armor' ); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination( array(
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ) ); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'comic-armor' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
