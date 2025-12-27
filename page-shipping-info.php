<?php
/**
 * Template Name: Shipping Info
 * Template for the Shipping Info page
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
            <span class="page-subtitle"><?php esc_html_e( 'Delivery Information', 'comic-armor' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Shipping', 'comic-armor' ); ?> <span><?php esc_html_e( 'Info', 'comic-armor' ); ?></span></h1>
            <p class="page-description"><?php esc_html_e( 'Everything you need to know about our shipping options and delivery times.', 'comic-armor' ); ?></p>
        </div>
    </section>

    <!-- Shipping Options Section -->
    <section class="section shipping-options">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle"><?php esc_html_e( 'Delivery Options', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Shipping', 'comic-armor' ); ?> <span><?php esc_html_e( 'Methods', 'comic-armor' ); ?></span></h2>
            </div>

            <div class="shipping-cards">
                <div class="shipping-card">
                    <div class="shipping-icon"><i class="fas fa-box"></i></div>
                    <h3><?php esc_html_e( 'Standard Shipping', 'comic-armor' ); ?></h3>
                    <div class="shipping-time"><?php esc_html_e( '3-5 Business Days', 'comic-armor' ); ?></div>
                    <ul class="shipping-details">
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'USPS First Class or Priority Mail', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Tracking included', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Secure packaging', 'comic-armor' ); ?></li>
                    </ul>
                    <div class="shipping-price"><?php esc_html_e( 'Calculated at checkout', 'comic-armor' ); ?></div>
                </div>

                <div class="shipping-card featured">
                    <div class="card-badge"><?php esc_html_e( 'Most Popular', 'comic-armor' ); ?></div>
                    <div class="shipping-icon"><i class="fas fa-shipping-fast"></i></div>
                    <h3><?php esc_html_e( 'Priority Shipping', 'comic-armor' ); ?></h3>
                    <div class="shipping-time"><?php esc_html_e( '2-3 Business Days', 'comic-armor' ); ?></div>
                    <ul class="shipping-details">
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'USPS Priority Mail', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Full tracking included', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Insurance included', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Signature confirmation available', 'comic-armor' ); ?></li>
                    </ul>
                    <div class="shipping-price"><?php esc_html_e( 'Calculated at checkout', 'comic-armor' ); ?></div>
                </div>

                <div class="shipping-card">
                    <div class="shipping-icon"><i class="fas fa-bolt"></i></div>
                    <h3><?php esc_html_e( 'Express Shipping', 'comic-armor' ); ?></h3>
                    <div class="shipping-time"><?php esc_html_e( '1-2 Business Days', 'comic-armor' ); ?></div>
                    <ul class="shipping-details">
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'USPS Priority Mail Express', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Guaranteed delivery date', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Full insurance included', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Signature required', 'comic-armor' ); ?></li>
                    </ul>
                    <div class="shipping-price"><?php esc_html_e( 'Calculated at checkout', 'comic-armor' ); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Processing Info -->
    <section class="section shipping-processing">
        <div class="container">
            <div class="processing-grid">
                <div class="processing-content">
                    <span class="section-subtitle"><?php esc_html_e( 'Order Processing', 'comic-armor' ); ?></span>
                    <h2 class="section-title"><?php esc_html_e( 'From Order to', 'comic-armor' ); ?> <span><?php esc_html_e( 'Delivery', 'comic-armor' ); ?></span></h2>
                    <p><?php esc_html_e( 'We process orders quickly to get your Comic Armor to you as fast as possible. Here\'s what to expect:', 'comic-armor' ); ?></p>

                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker">1</div>
                            <div class="timeline-content">
                                <h4><?php esc_html_e( 'Order Placed', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'You\'ll receive an order confirmation email immediately.', 'comic-armor' ); ?></p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">2</div>
                            <div class="timeline-content">
                                <h4><?php esc_html_e( 'Processing', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'Orders are processed within 1-2 business days.', 'comic-armor' ); ?></p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">3</div>
                            <div class="timeline-content">
                                <h4><?php esc_html_e( 'Shipped', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'Tracking information sent via email when your order ships.', 'comic-armor' ); ?></p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">4</div>
                            <div class="timeline-content">
                                <h4><?php esc_html_e( 'Delivered', 'comic-armor' ); ?></h4>
                                <p><?php esc_html_e( 'Your Comic Armor arrives ready to protect your comics!', 'comic-armor' ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="processing-info">
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-calendar-alt"></i></div>
                        <h4><?php esc_html_e( 'Cut-off Time', 'comic-armor' ); ?></h4>
                        <p><?php esc_html_e( 'Orders placed before 2:00 PM EST on business days are processed the same day.', 'comic-armor' ); ?></p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4><?php esc_html_e( 'Business Days', 'comic-armor' ); ?></h4>
                        <p><?php esc_html_e( 'Monday through Friday, excluding federal holidays. Weekend orders are processed Monday.', 'comic-armor' ); ?></p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h4><?php esc_html_e( 'Shipping Areas', 'comic-armor' ); ?></h4>
                        <p><?php esc_html_e( 'We currently ship to all 50 US states. International shipping coming soon.', 'comic-armor' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Free Shipping Banner -->
    <section class="section free-shipping-banner">
        <div class="container text-center">
            <div class="shipping-icon-large"><i class="fas fa-truck"></i></div>
            <h2 class="section-title"><?php esc_html_e( 'Free Shipping', 'comic-armor' ); ?> <span><?php esc_html_e( 'Available', 'comic-armor' ); ?></span></h2>
            <p><?php esc_html_e( 'Enjoy free standard shipping on qualifying orders. Check our current promotions for details.', 'comic-armor' ); ?></p>
            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Shop Now', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                </a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Additional Info -->
    <section class="section shipping-additional">
        <div class="container">
            <div class="additional-grid">
                <div class="additional-item">
                    <i class="fas fa-question-circle"></i>
                    <h3><?php esc_html_e( 'Have Questions?', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'Check our FAQ or contact our support team for help with shipping questions.', 'comic-armor' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="link-arrow"><?php esc_html_e( 'View FAQ', 'comic-armor' ); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="additional-item">
                    <i class="fas fa-undo"></i>
                    <h3><?php esc_html_e( 'Returns', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'Not satisfied? Learn about our 14-day return policy and how to initiate a return.', 'comic-armor' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>" class="link-arrow"><?php esc_html_e( 'Returns Policy', 'comic-armor' ); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="additional-item">
                    <i class="fas fa-headset"></i>
                    <h3><?php esc_html_e( 'Contact Support', 'comic-armor' ); ?></h3>
                    <p><?php esc_html_e( 'Need help tracking an order or have a shipping concern? We\'re here to help.', 'comic-armor' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="link-arrow"><?php esc_html_e( 'Contact Us', 'comic-armor' ); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
