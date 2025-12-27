<?php
/**
 * Template Name: FAQ
 * Template for the FAQ page
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
            <span class="page-subtitle"><?php esc_html_e( 'Help Center', 'comic-armor' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Frequently Asked', 'comic-armor' ); ?> <span><?php esc_html_e( 'Questions', 'comic-armor' ); ?></span></h1>
            <p class="page-description"><?php esc_html_e( 'Find answers to common questions about our products and services.', 'comic-armor' ); ?></p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section faq-section">
        <div class="container">
            <div class="faq-grid">
                <!-- Products FAQs -->
                <div class="faq-category">
                    <h2 class="faq-category-title"><i class="fas fa-box"></i> <?php esc_html_e( 'Products', 'comic-armor' ); ?></h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'What sizes of Comic Armor are available?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Comic Armor is designed to fit standard comic book sizes including regular issues, magazines, and graphic novels. Our products accommodate comics in standard bags and boards, providing a snug and protective fit for shipping.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'Can Comic Armor be reused?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Yes! Comic Armor is designed for multiple uses. As long as the product remains structurally sound without cracks or significant wear, you can reuse it many times. This makes it an economical and environmentally friendly choice.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'How much protection does Comic Armor provide?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Comic Armor provides military-grade protection against bending, crushing, and impact damage during shipping. Our rigid construction distributes force away from your comics, keeping them flat and safe even in rough handling conditions.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'What\'s the difference between pack sizes?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'We offer various pack sizes to suit different needs. Single packs are great for trying out the product, while bulk packs (10, 20, 50+) offer better value per unit for regular sellers and collectors who ship frequently.', 'comic-armor' ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Orders & Shipping FAQs -->
                <div class="faq-category">
                    <h2 class="faq-category-title"><i class="fas fa-shipping-fast"></i> <?php esc_html_e( 'Orders & Shipping', 'comic-armor' ); ?></h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'How long does shipping take?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Standard shipping typically takes 3-5 business days within the continental US. Expedited shipping options are available at checkout for faster delivery. Orders are processed within 1-2 business days.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'Do you ship internationally?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Currently, we ship within the United States. We\'re working on expanding our shipping options to serve international collectors in the future. Sign up for our newsletter to be notified when international shipping becomes available.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'How can I track my order?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Once your order ships, you\'ll receive an email with tracking information. You can also log into your account to view order status and tracking details at any time.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'Is free shipping available?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Yes! We offer free standard shipping on orders over a certain amount. Check our current promotions for free shipping thresholds and special offers.', 'comic-armor' ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Returns & Refunds FAQs -->
                <div class="faq-category">
                    <h2 class="faq-category-title"><i class="fas fa-undo"></i> <?php esc_html_e( 'Returns & Refunds', 'comic-armor' ); ?></h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'What is your return policy?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'We offer a 14-day return policy on unused, unopened products. If you\'re not satisfied with your purchase, contact us within 14 days of delivery to initiate a return. Please see our Returns Policy page for full details.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'What if my order arrives damaged?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'If your Comic Armor products arrive damaged, please contact us immediately with photos of the damage. We\'ll send a replacement at no additional cost. We take pride in our products and stand behind their quality.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'How do I request a refund?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'To request a refund, email us at support@comicarmor.com with your order number and reason for the return. We\'ll provide return instructions and process your refund within 5-7 business days of receiving the returned items.', 'comic-armor' ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Account & Payment FAQs -->
                <div class="faq-category">
                    <h2 class="faq-category-title"><i class="fas fa-user-circle"></i> <?php esc_html_e( 'Account & Payment', 'comic-armor' ); ?></h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'What payment methods do you accept?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'We accept all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, and other secure payment options available through our checkout process.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'Do I need an account to order?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'No, you can checkout as a guest. However, creating an account allows you to track orders, save addresses, and access faster checkout for future purchases.', 'comic-armor' ); ?></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            <span><?php esc_html_e( 'Is my payment information secure?', 'comic-armor' ); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p><?php esc_html_e( 'Absolutely. We use industry-standard SSL encryption and secure payment processors to protect your information. We never store your complete credit card details on our servers.', 'comic-armor' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section faq-cta">
        <div class="container text-center">
            <h2 class="section-title"><?php esc_html_e( 'Still Have', 'comic-armor' ); ?> <span><?php esc_html_e( 'Questions?', 'comic-armor' ); ?></span></h2>
            <p><?php esc_html_e( 'Can\'t find what you\'re looking for? Our support team is here to help.', 'comic-armor' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Contact Support', 'comic-armor' ); ?> <i class="fas fa-arrow-right btn-icon"></i>
            </a>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const answer = this.nextElementSibling;

            // Close all other answers
            faqQuestions.forEach(function(q) {
                q.setAttribute('aria-expanded', 'false');
                q.nextElementSibling.style.maxHeight = null;
            });

            // Toggle current answer
            if (!isExpanded) {
                this.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
});
</script>

<?php
get_footer();
