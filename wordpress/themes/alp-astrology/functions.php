<?php
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ALP_VERSION', '1.0.0' );
define( 'ALP_DIR', get_template_directory() );
define( 'ALP_URL', get_template_directory_uri() );

require_once ALP_DIR . '/inc/cpt.php';

/* ── Theme supports ──────────────────────────────────────── */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'elementor-page-builder' );
    add_theme_support( 'woocommerce' );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'alp-astrology' ),
        'footer'  => __( 'Footer Navigation', 'alp-astrology' ),
    ] );
} );

/* ── Enqueue assets ──────────────────────────────────────── */
add_action( 'wp_enqueue_scripts', function () {
    // Google Fonts
    wp_enqueue_style(
        'alp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&display=swap',
        [],
        null
    );
    // Main stylesheet (style.css = theme declaration + all CSS)
    wp_enqueue_style( 'alp-main', get_stylesheet_uri(), [ 'alp-google-fonts' ], ALP_VERSION );
    // Pages CSS
    wp_enqueue_style( 'alp-pages', ALP_URL . '/assets/css/pages.css', [ 'alp-main' ], ALP_VERSION );
    // Main JS
    wp_enqueue_script( 'alp-main', ALP_URL . '/assets/js/alp-main.js', [], ALP_VERSION, true );
    // Pass data to JS
    wp_localize_script( 'alp-main', 'alpData', [
        'logoUrl'  => alp_logo_url(),
        'phone'    => '+919786556156',
        'whatsapp' => 'https://wa.me/919786556156',
        'homeUrl'  => home_url( '/' ),
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'alp_nonce' ),
    ] );
} );

/* ── Logo helper ─────────────────────────────────────────── */
function alp_logo_url() {
    $logo_id = get_theme_mod( 'custom_logo' );
    if ( $logo_id ) {
        $src = wp_get_attachment_image_src( $logo_id, 'full' );
        if ( $src ) return $src[0];
    }
    return ALP_URL . '/assets/images/alp-logo.webp';
}

/* ── Body class ──────────────────────────────────────────── */
add_filter( 'body_class', function ( $classes ) {
    global $post;
    if ( is_front_page() ) $classes[] = 'page-home';
    if ( is_page() && $post ) $classes[] = 'page-' . $post->post_name;
    return $classes;
} );

/* ── Contact form AJAX handler ───────────────────────────── */
add_action( 'wp_ajax_alp_contact',        'alp_contact_handler' );
add_action( 'wp_ajax_nopriv_alp_contact', 'alp_contact_handler' );
function alp_contact_handler() {
    check_ajax_referer( 'alp_nonce', 'nonce' );
    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $service = sanitize_text_field( $_POST['service'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );
    if ( ! $name || ! $email || ! $message ) {
        wp_send_json_error( [ 'message' => __( 'Please fill all required fields.', 'alp-astrology' ) ] );
    }
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Please enter a valid email address.', 'alp-astrology' ) ] );
    }
    $to      = 'alpastrology@gmail.com';
    $subject = sprintf( __( 'New enquiry from %s — ALP Astrology', 'alp-astrology' ), $name );
    $body    = sprintf(
        "Name: %s\nEmail: %s\nPhone: %s\nService: %s\n\nMessage:\n%s",
        $name, $email, $phone, $service, $message
    );
    $headers = [ "Reply-To: $email", 'Content-Type: text/plain; charset=UTF-8' ];
    $sent    = wp_mail( $to, $subject, $body, $headers );
    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( 'Thank you! Your message has been sent. We will get back to you shortly.', 'alp-astrology' ) ] );
    } else {
        wp_send_json_error( [ 'message' => __( 'Sorry, there was a problem sending your message. Please try again or call us directly.', 'alp-astrology' ) ] );
    }
}

/* ── Newsletter AJAX handler ─────────────────────────────── */
add_action( 'wp_ajax_alp_newsletter',        'alp_newsletter_handler' );
add_action( 'wp_ajax_nopriv_alp_newsletter', 'alp_newsletter_handler' );
function alp_newsletter_handler() {
    check_ajax_referer( 'alp_nonce', 'nonce' );
    $email = sanitize_email( $_POST['email'] ?? '' );
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Please enter a valid email address.', 'alp-astrology' ) ] );
    }
    $subscribers = get_option( 'alp_newsletter_subscribers', [] );
    if ( ! in_array( $email, $subscribers, true ) ) {
        $subscribers[] = $email;
        update_option( 'alp_newsletter_subscribers', $subscribers );
    }
    wp_send_json_success( [ 'message' => __( 'Thank you for subscribing!', 'alp-astrology' ) ] );
}

/* ── Elementor global fonts ──────────────────────────────── */
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) {
    $fonts['Poppins']            = \Elementor\Fonts::GOOGLE;
    $fonts['Cormorant Garamond'] = \Elementor\Fonts::GOOGLE;
    return $fonts;
} );

/* ── Elementor init ──────────────────────────────────────── */
add_action( 'elementor/init', function () {
    if ( ! class_exists( '\Elementor\Plugin' ) ) return;
} );

/* ── Register all page templates ─────────────────────────── */
add_filter( 'theme_page_templates', function ( $templates ) {
    $templates['templates/elementor-full.php']          = __( 'Elementor Full Width', 'alp-astrology' );
    $templates['templates/template-about.php']          = __( 'About', 'alp-astrology' );
    $templates['templates/template-courses.php']        = __( 'Courses', 'alp-astrology' );
    $templates['templates/template-consultation.php']   = __( 'Consultation', 'alp-astrology' );
    $templates['templates/template-services.php']       = __( 'Services', 'alp-astrology' );
    $templates['templates/template-contact.php']        = __( 'Contact', 'alp-astrology' );
    $templates['templates/template-articles.php']       = __( 'Articles', 'alp-astrology' );
    $templates['templates/template-events.php']         = __( 'Events', 'alp-astrology' );
    $templates['templates/template-faq.php']            = __( 'FAQ', 'alp-astrology' );
    $templates['templates/template-testimonials.php']   = __( 'Testimonials', 'alp-astrology' );
    $templates['templates/template-success-stories.php'] = __( 'Success Stories', 'alp-astrology' );
    $templates['templates/template-videos.php']         = __( 'Videos', 'alp-astrology' );
    $templates['templates/template-horoscope.php']      = __( 'Horoscope', 'alp-astrology' );
    return $templates;
} );

/* ── Remove default WP emoji (performance) ──────────────── */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* ── Excerpt length ──────────────────────────────────────── */
add_filter( 'excerpt_length', fn() => 28 );

/* ── Excerpt more ────────────────────────────────────────── */
add_filter( 'excerpt_more', fn() => '&hellip;' );

/* ── Disable xmlrpc for security ─────────────────────────── */
add_filter( 'xmlrpc_enabled', '__return_false' );

/* ── Add preconnect for Google Fonts ─────────────────────── */
add_action( 'wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1 );

/* ── Custom image sizes ──────────────────────────────────── */
add_action( 'after_setup_theme', function () {
    add_image_size( 'alp-hero',        1600, 900,  true );
    add_image_size( 'alp-feature',     800,  600,  true );
    add_image_size( 'alp-card',        600,  450,  true );
    add_image_size( 'alp-thumb',       400,  300,  true );
    add_image_size( 'alp-avatar',      120,  120,  true );
    add_image_size( 'alp-zodiac',      600,  600,  true );
} );

/* ── WooCommerce support (optional) ──────────────────────── */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
} );

/* ── Contact Form 7 compatibility ────────────────────────── */
add_filter( 'wpcf7_autop_or_not', '__return_false' );
