<?php
/**
 * Template Name: Contact
 * Template for the Contact page
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
            <span class="page-subtitle"><?php esc_html_e( 'Get In Touch', 'comic-armor' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Contact', 'comic-armor' ); ?> <span><?php esc_html_e( 'Us', 'comic-armor' ); ?></span></h1>
            <p class="page-description"><?php esc_html_e( 'Have questions? We\'re here to help.', 'comic-armor' ); ?></p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Info -->
                <div class="contact-info-column">
                    <h2><?php esc_html_e( 'Let\'s Talk', 'comic-armor' ); ?></h2>
                    <p><?php esc_html_e( 'Whether you have questions about our products, need help with an order, or want to discuss bulk pricing, our team is ready to assist you.', 'comic-armor' ); ?></p>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon"><i class="fas fa-envelope"></i></div>
                            <div class="method-details">
                                <h4><?php esc_html_e( 'Email Us', 'comic-armor' ); ?></h4>
                                <a href="mailto:support@comicarmor.com">support@comicarmor.com</a>
                                <p><?php esc_html_e( 'We respond within 24 hours', 'comic-armor' ); ?></p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon"><i class="fas fa-clock"></i></div>
                            <div class="method-details">
                                <h4><?php esc_html_e( 'Business Hours', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'Monday - Friday', 'comic-armor' ); ?></p>
                                <p><?php esc_html_e( '9:00 AM - 5:00 PM EST', 'comic-armor' ); ?></p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="method-details">
                                <h4><?php esc_html_e( 'Location', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'United States', 'comic-armor' ); ?></p>
                                <p><?php esc_html_e( 'Shipping Nationwide', 'comic-armor' ); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-social">
                        <h4><?php esc_html_e( 'Follow Us', 'comic-armor' ); ?></h4>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-column">
                    <div class="contact-form-wrapper">
                        <h3><?php esc_html_e( 'Send Us a Message', 'comic-armor' ); ?></h3>
                        <form class="contact-form" id="contact-form" method="post">
                            <?php wp_nonce_field( 'comic_armor_contact', 'contact_nonce' ); ?>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contact-name"><?php esc_html_e( 'Your Name', 'comic-armor' ); ?> *</label>
                                    <input type="text" id="contact-name" name="contact_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact-email"><?php esc_html_e( 'Email Address', 'comic-armor' ); ?> *</label>
                                    <input type="email" id="contact-email" name="contact_email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact-subject"><?php esc_html_e( 'Subject', 'comic-armor' ); ?> *</label>
                                <select id="contact-subject" name="contact_subject" required>
                                    <option value=""><?php esc_html_e( 'Select a topic', 'comic-armor' ); ?></option>
                                    <option value="order"><?php esc_html_e( 'Order Inquiry', 'comic-armor' ); ?></option>
                                    <option value="product"><?php esc_html_e( 'Product Question', 'comic-armor' ); ?></option>
                                    <option value="bulk"><?php esc_html_e( 'Bulk Pricing', 'comic-armor' ); ?></option>
                                    <option value="return"><?php esc_html_e( 'Returns & Refunds', 'comic-armor' ); ?></option>
                                    <option value="other"><?php esc_html_e( 'Other', 'comic-armor' ); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact-message"><?php esc_html_e( 'Message', 'comic-armor' ); ?> *</label>
                                <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-full">
                                <?php esc_html_e( 'Send Message', 'comic-armor' ); ?> <i class="fas fa-paper-plane btn-icon"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ CTA -->
    <section class="section contact-faq">
        <div class="container text-center">
            <h2 class="section-title"><?php esc_html_e( 'Looking for Quick', 'comic-armor' ); ?> <span><?php esc_html_e( 'Answers?', 'comic-armor' ); ?></span></h2>
            <p><?php esc_html_e( 'Check out our FAQ page for answers to commonly asked questions.', 'comic-armor' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'View FAQ', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
