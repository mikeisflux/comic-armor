<?php
/**
 * Footer Template
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <!-- Brand Column -->
                    <div class="footer-brand">
                        <div class="logo-text">COMIC<span>ARMOR</span></div>
                        <p><?php esc_html_e( 'Military-grade protection for your valuable comic book collection. Trusted by collectors worldwide.', 'comic-armor' ); ?></p>
                        <div class="footer-social">
                            <?php
                            $social_links = array(
                                'facebook'  => 'fab fa-facebook-f',
                                'twitter'   => 'fab fa-twitter',
                                'instagram' => 'fab fa-instagram',
                                'youtube'   => 'fab fa-youtube',
                                'tiktok'    => 'fab fa-tiktok',
                            );

                            foreach ( $social_links as $network => $icon ) :
                                $url = get_theme_mod( 'social_' . $network );
                                if ( $url ) :
                                    ?>
                                    <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                    </a>
                                    <?php
                                endif;
                            endforeach;

                            // Show placeholder icons if no social links set
                            if ( ! get_theme_mod( 'social_facebook' ) && ! get_theme_mod( 'social_instagram' ) ) :
                                ?>
                                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-column">
                        <h4><?php esc_html_e( 'Quick Links', 'comic-armor' ); ?></h4>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'comic-armor' ); ?></a></li>
                            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                                <li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Shop', 'comic-armor' ); ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'comic-armor' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'comic-armor' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'FAQ', 'comic-armor' ); ?></a></li>
                        </ul>
                    </div>

                    <!-- Customer Service -->
                    <div class="footer-column">
                        <h4><?php esc_html_e( 'Customer Service', 'comic-armor' ); ?></h4>
                        <ul>
                            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                                <li><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><?php esc_html_e( 'My Account', 'comic-armor' ); ?></a></li>
                                <li><a href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>"><?php esc_html_e( 'Cart', 'comic-armor' ); ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo esc_url( home_url( '/shipping-info/' ) ); ?>"><?php esc_html_e( 'Shipping Info', 'comic-armor' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>"><?php esc_html_e( 'Returns Policy', 'comic-armor' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/track-order/' ) ); ?>"><?php esc_html_e( 'Track Order', 'comic-armor' ); ?></a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="footer-column">
                        <h4><?php esc_html_e( 'Contact Us', 'comic-armor' ); ?></h4>
                        <ul class="contact-info">
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:support@comicarmor.com">support@comicarmor.com</a>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:+18005551234">1-800-555-1234</a>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Mon-Fri: 9AM - 5PM EST</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'comic-armor' ); ?> |
                    <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'comic-armor' ); ?></a> |
                    <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms & Conditions', 'comic-armor' ); ?></a>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
