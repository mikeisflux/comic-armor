<?php
/**
 * Template Tags
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Display posted on date
 */
function comic_armor_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );

    printf(
        '<span class="posted-on"><i class="fas fa-calendar-alt"></i> %s</span>',
        $time_string
    );
}

/**
 * Display posted by author
 */
function comic_armor_posted_by() {
    printf(
        '<span class="posted-by"><i class="fas fa-user"></i> %s</span>',
        '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
    );
}

/**
 * Display entry footer
 */
function comic_armor_entry_footer() {
    // Categories
    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( ', ' );
        if ( $categories_list ) {
            printf( '<span class="cat-links"><i class="fas fa-folder"></i> %s</span>', $categories_list );
        }

        $tags_list = get_the_tag_list( '', ', ' );
        if ( $tags_list ) {
            printf( '<span class="tags-links"><i class="fas fa-tags"></i> %s</span>', $tags_list );
        }
    }

    // Comments
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link"><i class="fas fa-comments"></i> ';
        comments_popup_link(
            esc_html__( 'Leave a comment', 'comic-armor' ),
            esc_html__( '1 Comment', 'comic-armor' ),
            esc_html__( '% Comments', 'comic-armor' )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                __( 'Edit <span class="screen-reader-text">%s</span>', 'comic-armor' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            get_the_title()
        ),
        '<span class="edit-link"><i class="fas fa-edit"></i> ',
        '</span>'
    );
}

/**
 * Display post thumbnail
 */
function comic_armor_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
        <?php
    else :
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_post_thumbnail( 'medium_large' ); ?>
        </a>
        <?php
    endif;
}

/**
 * Display breadcrumbs
 */
function comic_armor_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'comic-armor' ) . '</a>';
    echo '<span class="separator"> / </span>';

    if ( is_category() || is_single() ) {
        $categories = get_the_category();
        if ( $categories ) {
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            echo '<span class="separator"> / </span>';
        }
    }

    if ( is_single() ) {
        the_title();
    } elseif ( is_page() ) {
        the_title();
    } elseif ( is_category() ) {
        single_cat_title();
    } elseif ( is_tag() ) {
        single_tag_title();
    } elseif ( is_author() ) {
        the_author();
    } elseif ( is_search() ) {
        esc_html_e( 'Search Results', 'comic-armor' );
    } elseif ( is_404() ) {
        esc_html_e( 'Page Not Found', 'comic-armor' );
    }

    echo '</nav>';
}
