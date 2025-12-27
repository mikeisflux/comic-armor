<?php
/**
 * Template Name: Returns Policy
 * Template for the Returns Policy page
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
            <span class="page-subtitle"><?php esc_html_e( 'Customer Service', 'comic-armor' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Returns', 'comic-armor' ); ?> <span><?php esc_html_e( 'Policy', 'comic-armor' ); ?></span></h1>
            <p class="page-description"><?php esc_html_e( 'We stand behind our products. Learn about our hassle-free return process.', 'comic-armor' ); ?></p>
        </div>
    </section>

    <!-- Return Policy Overview -->
    <section class="section returns-overview">
        <div class="container">
            <div class="overview-grid">
                <div class="overview-main">
                    <span class="section-subtitle"><?php esc_html_e( '14-Day Guarantee', 'comic-armor' ); ?></span>
                    <h2 class="section-title"><?php esc_html_e( 'Our Return', 'comic-armor' ); ?> <span><?php esc_html_e( 'Promise', 'comic-armor' ); ?></span></h2>
                    <p class="lead"><?php esc_html_e( 'We want you to be completely satisfied with your Comic Armor purchase. If for any reason you\'re not happy, we offer a straightforward 14-day return policy.', 'comic-armor' ); ?></p>
                </div>
                <div class="overview-highlights">
                    <div class="highlight-item">
                        <div class="highlight-icon"><i class="fas fa-calendar-check"></i></div>
                        <div class="highlight-text">
                            <strong>14 Days</strong>
                            <span><?php esc_html_e( 'Return Window', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-icon"><i class="fas fa-box"></i></div>
                        <div class="highlight-text">
                            <strong><?php esc_html_e( 'Unused Items', 'comic-armor' ); ?></strong>
                            <span><?php esc_html_e( 'Original Packaging', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="highlight-text">
                            <strong><?php esc_html_e( 'Full Refund', 'comic-armor' ); ?></strong>
                            <span><?php esc_html_e( 'Product Cost Refunded', 'comic-armor' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Return Conditions -->
    <section class="section returns-conditions">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle"><?php esc_html_e( 'Eligibility', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Return', 'comic-armor' ); ?> <span><?php esc_html_e( 'Conditions', 'comic-armor' ); ?></span></h2>
            </div>

            <div class="conditions-grid">
                <div class="condition-card eligible">
                    <div class="card-header">
                        <i class="fas fa-check-circle"></i>
                        <h3><?php esc_html_e( 'Eligible for Return', 'comic-armor' ); ?></h3>
                    </div>
                    <ul>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Items returned within 14 days of delivery', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Products in original, unopened packaging', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Unused and undamaged items', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Items with all original tags and materials', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Products damaged during shipping (contact us immediately)', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Defective or incorrect items', 'comic-armor' ); ?></li>
                    </ul>
                </div>

                <div class="condition-card not-eligible">
                    <div class="card-header">
                        <i class="fas fa-times-circle"></i>
                        <h3><?php esc_html_e( 'Not Eligible for Return', 'comic-armor' ); ?></h3>
                    </div>
                    <ul>
                        <li><i class="fas fa-times"></i> <?php esc_html_e( 'Items returned after 14 days', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-times"></i> <?php esc_html_e( 'Opened or used products', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-times"></i> <?php esc_html_e( 'Items damaged by customer use', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-times"></i> <?php esc_html_e( 'Products without original packaging', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-times"></i> <?php esc_html_e( 'Clearance or final sale items', 'comic-armor' ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Return Process -->
    <section class="section returns-process">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle"><?php esc_html_e( 'Easy Process', 'comic-armor' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'How to Return', 'comic-armor' ); ?> <span><?php esc_html_e( 'Your Order', 'comic-armor' ); ?></span></h2>
            </div>

            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3><?php esc_html_e( 'Contact Us', 'comic-armor' ); ?></h3>
                        <p><?php esc_html_e( 'Email us at support@comicarmor.com with your order number and reason for return. We\'ll respond within 24 hours with return authorization.', 'comic-armor' ); ?></p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3><?php esc_html_e( 'Pack Your Items', 'comic-armor' ); ?></h3>
                        <p><?php esc_html_e( 'Securely pack the items in their original packaging. Include the return authorization number we provide.', 'comic-armor' ); ?></p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3><?php esc_html_e( 'Ship It Back', 'comic-armor' ); ?></h3>
                        <p><?php esc_html_e( 'Ship the package to the address provided in your return authorization. We recommend using a trackable shipping method.', 'comic-armor' ); ?></p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3><?php esc_html_e( 'Receive Refund', 'comic-armor' ); ?></h3>
                        <p><?php esc_html_e( 'Once we receive and inspect your return, we\'ll process your refund within 5-7 business days to your original payment method.', 'comic-armor' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Refund Info -->
    <section class="section returns-refund">
        <div class="container">
            <div class="refund-grid">
                <div class="refund-content">
                    <span class="section-subtitle"><?php esc_html_e( 'Refund Details', 'comic-armor' ); ?></span>
                    <h2 class="section-title"><?php esc_html_e( 'What to', 'comic-armor' ); ?> <span><?php esc_html_e( 'Expect', 'comic-armor' ); ?></span></h2>
                    <ul class="refund-list">
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Full refund of product cost for eligible returns', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Original shipping costs are non-refundable unless we made an error', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Return shipping is the responsibility of the customer', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Refunds processed within 5-7 business days of receiving return', 'comic-armor' ); ?></li>
                        <li><i class="fas fa-check"></i> <?php esc_html_e( 'Credit card refunds may take additional time to appear on statement', 'comic-armor' ); ?></li>
                    </ul>
                </div>
                <div class="refund-note">
                    <div class="note-card">
                        <i class="fas fa-exclamation-circle"></i>
                        <h4><?php esc_html_e( 'Damaged in Shipping?', 'comic-armor' ); ?></h4>
                        <p><?php esc_html_e( 'If your order arrived damaged, please contact us within 48 hours with photos of the damage. We\'ll send a replacement at no additional cost or provide a full refund including shipping.', 'comic-armor' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Exchange Option -->
    <section class="section returns-exchange">
        <div class="container text-center">
            <span class="section-subtitle"><?php esc_html_e( 'Need Something Different?', 'comic-armor' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Exchanges', 'comic-armor' ); ?> <span><?php esc_html_e( 'Available', 'comic-armor' ); ?></span></h2>
            <p><?php esc_html_e( 'Want to exchange for a different product? Contact us and we\'ll help arrange an exchange. Simply return the original item and place a new order, or contact us to coordinate the exchange.', 'comic-armor' ); ?></p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Contact Us', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
                </a>
                <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'View FAQ', 'comic-armor' ); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
