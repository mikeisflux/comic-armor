<?php
/**
 * Template Functions
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add pingback header
 */
function comic_armor_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'comic_armor_pingback_header' );

/**
 * Add preconnect for Google Fonts
 */
function comic_armor_preconnect_google_fonts( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => '',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'comic_armor_preconnect_google_fonts', 10, 2 );

/**
 * Modify excerpt more
 */
function comic_armor_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'comic_armor_excerpt_more' );

/**
 * Custom comment callback
 */
function comic_armor_comment( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                    if ( 0 != $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    printf( '<b class="fn">%s</b>', get_comment_author_link() );
                    ?>
                </div>

                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                            printf(
                                esc_html__( '%1$s at %2$s', 'comic-armor' ),
                                get_comment_date(),
                                get_comment_time()
                            );
                            ?>
                        </time>
                    </a>
                    <?php edit_comment_link( esc_html__( 'Edit', 'comic-armor' ), ' <span class="edit-link">', '</span>' ); ?>
                </div>

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'comic-armor' ); ?></p>
                <?php endif; ?>
            </footer>

            <div class="comment-content">
                <?php comment_text(); ?>
            </div>

            <?php
            comment_reply_link( array_merge( $args, array(
                'add_below' => 'div-comment',
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply">',
                'after'     => '</div>',
            ) ) );
            ?>
        </article>
    <?php
}

/**
 * Add schema markup to body
 */
function comic_armor_schema_org() {
    $schema = 'https://schema.org/';

    if ( is_single() ) {
        $type = 'Article';
    } elseif ( is_author() ) {
        $type = 'ProfilePage';
    } elseif ( is_search() ) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }

    return sprintf( 'itemscope itemtype="%s%s"', esc_url( $schema ), esc_attr( $type ) );
}
