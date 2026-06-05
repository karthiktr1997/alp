<?php
/**
 * Plugin Name: ALP Astrology Setup
 * Plugin URI:  https://alpastrology.com
 * Description: One-click setup for the ALP Astrology website — creates all required pages, sets reading options, and registers Elementor global colors.
 * Version:     1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author:      ALP Astrology
 * Text Domain: alp-setup
 * License:     GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ALP_SETUP_VERSION', '1.0.0' );
define( 'ALP_SETUP_FILE',    __FILE__ );
define( 'ALP_SETUP_DIR',     plugin_dir_path( __FILE__ ) );
define( 'ALP_SETUP_URL',     plugin_dir_url( __FILE__ ) );

/* ══════════════════════════════════════════════════════════
   ACTIVATION HOOK
══════════════════════════════════════════════════════════ */
register_activation_hook( __FILE__, 'alp_setup_activate' );
function alp_setup_activate() {
    alp_setup_run();
}

/* ══════════════════════════════════════════════════════════
   DEACTIVATION HOOK  (preserves pages)
══════════════════════════════════════════════════════════ */
register_deactivation_hook( __FILE__, 'alp_setup_deactivate' );
function alp_setup_deactivate() {
    // Nothing — pages are preserved intentionally.
}

/* ══════════════════════════════════════════════════════════
   ADMIN NOTICE — if Elementor not installed
══════════════════════════════════════════════════════════ */
add_action( 'admin_notices', 'alp_setup_elementor_notice' );
function alp_setup_elementor_notice() {
    if ( defined( 'ELEMENTOR_VERSION' ) ) return;
    if ( ! current_user_can( 'install_plugins' ) ) return;
    echo '<div class="notice notice-warning is-dismissible">';
    echo '<p><strong>ALP Astrology Setup:</strong> Elementor is not installed. Please install and activate <a href="' . esc_url( admin_url( 'plugin-install.php?s=elementor&tab=search' ) ) . '">Elementor</a> for the best experience.</p>';
    echo '</div>';
}

/* ══════════════════════════════════════════════════════════
   ADMIN PAGE — Settings > ALP Setup
══════════════════════════════════════════════════════════ */
add_action( 'admin_menu', 'alp_setup_admin_menu' );
function alp_setup_admin_menu() {
    add_options_page(
        __( 'ALP Astrology Setup', 'alp-setup' ),
        __( 'ALP Setup', 'alp-setup' ),
        'manage_options',
        'alp-setup',
        'alp_setup_admin_page'
    );
}

function alp_setup_admin_page() {
    // Handle "Run Setup" button
    $result_message = '';
    $result_type    = 'updated';
    if (
        isset( $_POST['alp_run_setup'] ) &&
        check_admin_referer( 'alp_run_setup_action', 'alp_run_setup_nonce' )
    ) {
        $result = alp_setup_run();
        $result_message = $result['message'];
        $result_type    = $result['success'] ? 'updated' : 'error';
    }
    ?>
    <div class="wrap">
      <h1><?php esc_html_e( 'ALP Astrology Setup', 'alp-setup' ); ?></h1>

      <?php if ( $result_message ) : ?>
        <div class="notice <?php echo esc_attr( $result_type ); ?> is-dismissible">
          <p><?php echo esc_html( $result_message ); ?></p>
        </div>
      <?php endif; ?>

      <div style="background:#fff;border:1px solid #e2e2e2;border-radius:6px;padding:24px;max-width:720px;margin-top:16px;">
        <h2 style="margin-top:0;"><?php esc_html_e( 'Setup Wizard', 'alp-setup' ); ?></h2>
        <p><?php esc_html_e( 'Click "Run Setup" to:', 'alp-setup' ); ?></p>
        <ul style="list-style:disc;padding-left:1.5em;color:#555;">
          <li><?php esc_html_e( 'Create all required pages (Home, About, Courses, Consultation, Services, Contact, and Resource pages)', 'alp-setup' ); ?></li>
          <li><?php esc_html_e( 'Set the Home page as the front page in Settings > Reading', 'alp-setup' ); ?></li>
          <li><?php esc_html_e( 'Register Elementor global colors (ALP brand palette)', 'alp-setup' ); ?></li>
          <li><?php esc_html_e( 'Assign the "Elementor Full Width" template to inner pages', 'alp-setup' ); ?></li>
        </ul>
        <p style="color:#777;font-size:.9em;"><?php esc_html_e( 'Safe to run multiple times — existing pages will not be duplicated.', 'alp-setup' ); ?></p>

        <form method="post" action="">
          <?php wp_nonce_field( 'alp_run_setup_action', 'alp_run_setup_nonce' ); ?>
          <input type="submit" name="alp_run_setup" class="button button-primary button-large" value="<?php esc_attr_e( 'Run Setup', 'alp-setup' ); ?>">
        </form>
      </div>

      <div style="background:#fff;border:1px solid #e2e2e2;border-radius:6px;padding:24px;max-width:720px;margin-top:16px;">
        <h2 style="margin-top:0;"><?php esc_html_e( 'Newsletter Subscribers', 'alp-setup' ); ?></h2>
        <?php
        $subscribers = get_option( 'alp_newsletter_subscribers', [] );
        if ( ! empty( $subscribers ) ) :
        ?>
          <p><?php printf( esc_html__( 'Total subscribers: %d', 'alp-setup' ), count( $subscribers ) ); ?></p>
          <form method="post" action="">
            <?php wp_nonce_field( 'alp_export_subs_action', 'alp_export_subs_nonce' ); ?>
            <input type="submit" name="alp_export_subs" class="button" value="<?php esc_attr_e( 'Export as CSV', 'alp-setup' ); ?>">
          </form>
        <?php else : ?>
          <p style="color:#777;"><?php esc_html_e( 'No newsletter subscribers yet.', 'alp-setup' ); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <?php
}

/* ══════════════════════════════════════════════════════════
   EXPORT SUBSCRIBERS CSV
══════════════════════════════════════════════════════════ */
add_action( 'admin_init', 'alp_setup_export_subscribers' );
function alp_setup_export_subscribers() {
    if (
        ! isset( $_POST['alp_export_subs'] ) ||
        ! check_admin_referer( 'alp_export_subs_action', 'alp_export_subs_nonce' ) ||
        ! current_user_can( 'manage_options' )
    ) {
        return;
    }
    $subscribers = get_option( 'alp_newsletter_subscribers', [] );
    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename="alp-newsletter-subscribers.csv"' );
    $output = fopen( 'php://output', 'w' );
    fputcsv( $output, [ 'Email', 'Subscribed' ] );
    foreach ( $subscribers as $email ) {
        fputcsv( $output, [ $email, '' ] );
    }
    fclose( $output );
    exit;
}

/* ══════════════════════════════════════════════════════════
   CORE SETUP FUNCTION
══════════════════════════════════════════════════════════ */
function alp_setup_run() {
    $created = 0;
    $skipped = 0;

    /* ── Pages to create ── */
    $pages = [
        [
            'title'    => 'Home',
            'slug'     => 'home',
            'template' => '',
            'content'  => '',
        ],
        [
            'title'    => 'About',
            'slug'     => 'about',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Courses',
            'slug'     => 'courses',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Consultation',
            'slug'     => 'consultation',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Services',
            'slug'     => 'services',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Horoscope',
            'slug'     => 'horoscope',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Articles',
            'slug'     => 'articles',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Videos',
            'slug'     => 'videos',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Events',
            'slug'     => 'events',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Testimonials',
            'slug'     => 'testimonials',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'FAQ',
            'slug'     => 'faq',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Success Stories',
            'slug'     => 'success-stories',
            'template' => 'templates/elementor-full.php',
            'content'  => '<!-- Elementor -->',
        ],
        [
            'title'    => 'Privacy Policy',
            'slug'     => 'privacy-policy',
            'template' => '',
            'content'  => '<!-- Add your privacy policy here -->',
        ],
        [
            'title'    => 'Terms of Use',
            'slug'     => 'terms',
            'template' => '',
            'content'  => '<!-- Add your terms of use here -->',
        ],
    ];

    $home_page_id = 0;

    foreach ( $pages as $page_data ) {
        // Check if page with this slug already exists
        $existing = get_page_by_path( $page_data['slug'], OBJECT, 'page' );
        if ( $existing ) {
            $skipped++;
            if ( $page_data['slug'] === 'home' ) {
                $home_page_id = $existing->ID;
            }
            continue;
        }

        $args = [
            'post_title'     => $page_data['title'],
            'post_name'      => $page_data['slug'],
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => $page_data['content'],
            'comment_status' => 'closed',
        ];

        $page_id = wp_insert_post( $args );

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            $created++;
            if ( $page_data['template'] ) {
                update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
            }
            if ( $page_data['slug'] === 'home' ) {
                $home_page_id = $page_id;
            }
        }
    }

    /* ── Reading settings ── */
    if ( $home_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_page_id );
    }

    /* ── Elementor global colors (kit) ── */
    alp_setup_register_elementor_colors();

    /* ── Flush rewrite rules ── */
    flush_rewrite_rules();

    $message = sprintf(
        __( 'Setup complete! %d pages created, %d already existed.', 'alp-setup' ),
        $created,
        $skipped
    );

    return [ 'success' => true, 'message' => $message ];
}

/* ══════════════════════════════════════════════════════════
   ELEMENTOR GLOBAL COLORS
══════════════════════════════════════════════════════════ */
function alp_setup_register_elementor_colors() {
    if ( ! defined( 'ELEMENTOR_VERSION' ) ) return;

    // Find the active kit ID
    $kit_id = get_option( 'elementor_active_kit' );
    if ( ! $kit_id ) return;

    // Get current system colors from kit meta
    $current_colors = get_post_meta( $kit_id, '_elementor_page_settings', true );
    if ( ! is_array( $current_colors ) ) {
        $current_colors = [];
    }

    $alp_colors = [
        [
            '_id'   => 'alp-gold',
            'title' => 'ALP Gold',
            'color' => '#F4A11C',
        ],
        [
            '_id'   => 'alp-red',
            'title' => 'ALP Red',
            'color' => '#E11D17',
        ],
        [
            '_id'   => 'alp-ink',
            'title' => 'ALP Ink',
            'color' => '#1C1813',
        ],
        [
            '_id'   => 'alp-cream',
            'title' => 'ALP Cream',
            'color' => '#FFFCF6',
        ],
        [
            '_id'   => 'alp-navy',
            'title' => 'Cosmic Navy',
            'color' => '#0A0E27',
        ],
        [
            '_id'   => 'alp-amber',
            'title' => 'ALP Amber',
            'color' => '#F6B53C',
        ],
        [
            '_id'   => 'alp-saffron-deep',
            'title' => 'Saffron Deep',
            'color' => '#E07A12',
        ],
        [
            '_id'   => 'alp-cos-gold',
            'title' => 'Cosmic Gold',
            'color' => '#E8C36B',
        ],
    ];

    // Merge with existing — don't duplicate
    $existing_ids = [];
    if ( ! empty( $current_colors['system_colors'] ) ) {
        foreach ( $current_colors['system_colors'] as $color ) {
            $existing_ids[] = $color['_id'];
        }
    } else {
        $current_colors['system_colors'] = [];
    }

    foreach ( $alp_colors as $color ) {
        if ( ! in_array( $color['_id'], $existing_ids, true ) ) {
            $current_colors['system_colors'][] = $color;
        }
    }

    // Global fonts
    $alp_fonts = [
        [
            '_id'         => 'alp-primary',
            'title'       => 'ALP Primary (Poppins)',
            'font_family' => 'Poppins',
            'font_weight' => '700',
        ],
        [
            '_id'         => 'alp-secondary',
            'title'       => 'ALP Secondary (Cormorant)',
            'font_family' => 'Cormorant Garamond',
            'font_weight' => '500',
        ],
        [
            '_id'         => 'alp-body',
            'title'       => 'ALP Body',
            'font_family' => 'Helvetica Neue',
            'font_weight' => '400',
        ],
    ];

    if ( empty( $current_colors['system_typography'] ) ) {
        $current_colors['system_typography'] = [];
    }

    $existing_typo_ids = array_column( $current_colors['system_typography'], '_id' );
    foreach ( $alp_fonts as $font ) {
        if ( ! in_array( $font['_id'], $existing_typo_ids, true ) ) {
            $current_colors['system_typography'][] = $font;
        }
    }

    update_post_meta( $kit_id, '_elementor_page_settings', $current_colors );
}

/* ══════════════════════════════════════════════════════════
   PLUGIN LOADED
══════════════════════════════════════════════════════════ */
add_action( 'plugins_loaded', 'alp_setup_loaded' );
function alp_setup_loaded() {
    load_plugin_textdomain( 'alp-setup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
