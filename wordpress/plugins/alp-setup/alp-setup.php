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
            'template' => 'templates/template-about.php',
            'content'  => '',
        ],
        [
            'title'    => 'Courses',
            'slug'     => 'courses',
            'template' => 'templates/template-courses.php',
            'content'  => '',
        ],
        [
            'title'    => 'Consultation',
            'slug'     => 'consultation',
            'template' => 'templates/template-consultation.php',
            'content'  => '',
        ],
        [
            'title'    => 'Services',
            'slug'     => 'services',
            'template' => 'templates/template-services.php',
            'content'  => '',
        ],
        [
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => 'templates/template-contact.php',
            'content'  => '',
        ],
        [
            'title'    => 'Horoscope',
            'slug'     => 'horoscope',
            'template' => 'templates/template-horoscope.php',
            'content'  => '',
        ],
        [
            'title'    => 'Articles',
            'slug'     => 'articles',
            'template' => 'templates/template-articles.php',
            'content'  => '',
        ],
        [
            'title'    => 'Videos',
            'slug'     => 'videos',
            'template' => 'templates/template-videos.php',
            'content'  => '',
        ],
        [
            'title'    => 'Events',
            'slug'     => 'events',
            'template' => 'templates/template-events.php',
            'content'  => '',
        ],
        [
            'title'    => 'Testimonials',
            'slug'     => 'testimonials',
            'template' => 'templates/template-testimonials.php',
            'content'  => '',
        ],
        [
            'title'    => 'FAQ',
            'slug'     => 'faq',
            'template' => 'templates/template-faq.php',
            'content'  => '',
        ],
        [
            'title'    => 'Success Stories',
            'slug'     => 'success-stories',
            'template' => 'templates/template-success-stories.php',
            'content'  => '',
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

    /* ── Zodiac CPT posts ── */
    alp_setup_create_zodiac_posts();

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
   CREATE ZODIAC CPT POSTS
══════════════════════════════════════════════════════════ */
function alp_setup_create_zodiac_posts() {
    $signs = [
        [
            'title'     => 'Aries',
            'slug'      => 'aries',
            'glyph'     => '♈︎',
            'dates'     => 'Mar 21–Apr 19',
            'element'   => 'Fire',
            'planet'    => 'Mars',
            'quality'   => 'Cardinal',
            'desc'      => 'Bold pioneering and full of initiative — Aries charges at life head-first',
            'strengths' => "Courageous & driven\nNatural leader\nHonest & direct\nEnergetic initiator",
            'growth'    => "Can be impatient\nQuick to anger\nActs before thinking",
            'prev'      => 'pisces',
            'next'      => 'taurus',
            'banner'    => 'aries',
        ],
        [
            'title'     => 'Taurus',
            'slug'      => 'taurus',
            'glyph'     => '♉︎',
            'dates'     => 'Apr 20–May 20',
            'element'   => 'Earth',
            'planet'    => 'Venus',
            'quality'   => 'Fixed',
            'desc'      => 'Patient, determined and deeply sensual — Taurus builds with care and cherishes the fruits of steady effort',
            'strengths' => "Dependable & patient\nLoyal & devoted\nPractical & resourceful\nAppreciation for beauty",
            'growth'    => "Can be stubborn\nResistant to change\nPossessive tendencies",
            'prev'      => 'aries',
            'next'      => 'gemini',
            'banner'    => 'taurus',
        ],
        [
            'title'     => 'Gemini',
            'slug'      => 'gemini',
            'glyph'     => '♊︎',
            'dates'     => 'May 21–Jun 20',
            'element'   => 'Air',
            'planet'    => 'Mercury',
            'quality'   => 'Mutable',
            'desc'      => 'Quick-minded and endlessly curious — Gemini thrives on communication ideas and connecting worlds',
            'strengths' => "Adaptable & versatile\nIntellectually curious\nWitty communicator\nQuick learner",
            'growth'    => "Can be inconsistent\nProne to overthinking\nDifficulty deciding",
            'prev'      => 'taurus',
            'next'      => 'cancer',
            'banner'    => 'gemini',
        ],
        [
            'title'     => 'Cancer',
            'slug'      => 'cancer',
            'glyph'     => '♋︎',
            'dates'     => 'Jun 21–Jul 22',
            'element'   => 'Water',
            'planet'    => 'Moon',
            'quality'   => 'Cardinal',
            'desc'      => 'Tender perceptive and fiercely protective — Cancer flows between intuition and emotion guided by the Moon',
            'strengths' => "Deeply intuitive\nNurturing & caring\nLoyal to loved ones\nEmotionally intelligent",
            'growth'    => "Can be overly sensitive\nProne to moodiness\nHolds on too tightly",
            'prev'      => 'gemini',
            'next'      => 'leo',
            'banner'    => 'cancer',
        ],
        [
            'title'     => 'Leo',
            'slug'      => 'leo',
            'glyph'     => '♌︎',
            'dates'     => 'Jul 23–Aug 22',
            'element'   => 'Fire',
            'planet'    => 'Sun',
            'quality'   => 'Fixed',
            'desc'      => 'Radiant bold and generous — Leo commands the stage with heart and fire burning bright as the Sun itself',
            'strengths' => "Natural performer\nGenerous & warm-hearted\nConfident leader\nCreative & dramatic",
            'growth'    => "Can be prideful\nNeeds constant validation\nDomineering at times",
            'prev'      => 'cancer',
            'next'      => 'virgo',
            'banner'    => 'leo',
        ],
        [
            'title'     => 'Virgo',
            'slug'      => 'virgo',
            'glyph'     => '♍︎',
            'dates'     => 'Aug 23–Sep 22',
            'element'   => 'Earth',
            'planet'    => 'Mercury',
            'quality'   => 'Mutable',
            'desc'      => 'Discerning diligent and devoted to craft — Virgo finds meaning in mastery and the art of refinement',
            'strengths' => "Detail-oriented & precise\nAnalytical & methodical\nHelpful & reliable\nStrong work ethic",
            'growth'    => "Tendency toward perfectionism\nOverly self-critical\nCan be overcautious",
            'prev'      => 'leo',
            'next'      => 'libra',
            'banner'    => 'virgo',
        ],
        [
            'title'     => 'Libra',
            'slug'      => 'libra',
            'glyph'     => '♎︎',
            'dates'     => 'Sep 23–Oct 22',
            'element'   => 'Air',
            'planet'    => 'Venus',
            'quality'   => 'Cardinal',
            'desc'      => 'Graceful balanced and ever seeking harmony — Libra weighs all sides and chooses the beautiful middle path',
            'strengths' => "Diplomatic & fair\nStrong sense of justice\nCharming & sociable\nArtistic sensibility",
            'growth'    => "Indecisive at times\nAvoids confrontation\nPeople-pleasing tendency",
            'prev'      => 'virgo',
            'next'      => 'scorpio',
            'banner'    => 'libra',
        ],
        [
            'title'     => 'Scorpio',
            'slug'      => 'scorpio',
            'glyph'     => '♏︎',
            'dates'     => 'Oct 23–Nov 21',
            'element'   => 'Water',
            'planet'    => 'Mars/Pluto',
            'quality'   => 'Fixed',
            'desc'      => 'Mysterious powerful and transformative — Scorpio dives deep into the unseen and emerges forever changed',
            'strengths' => "Intensely passionate\nPerceptive & resourceful\nMagnetic presence\nFiercely loyal",
            'growth'    => "Can be secretive\nProne to jealousy\nDifficulty trusting",
            'prev'      => 'libra',
            'next'      => 'sagittarius',
            'banner'    => 'scorpio',
        ],
        [
            'title'     => 'Sagittarius',
            'slug'      => 'sagittarius',
            'glyph'     => '♐︎',
            'dates'     => 'Nov 22–Dec 21',
            'element'   => 'Fire',
            'planet'    => 'Jupiter',
            'quality'   => 'Mutable',
            'desc'      => 'Boundless optimistic and forever seeking truth — Sagittarius aims its arrow at the horizon and rides towards wisdom',
            'strengths' => "Optimistic & adventurous\nPhilosophical thinker\nHonest & direct\nLove of freedom",
            'growth'    => "Can be restless\nOverconfident at times\nBlunt to a fault",
            'prev'      => 'scorpio',
            'next'      => 'capricorn',
            'banner'    => 'sagittarius',
        ],
        [
            'title'     => 'Capricorn',
            'slug'      => 'capricorn',
            'glyph'     => '♑︎',
            'dates'     => 'Dec 22–Jan 19',
            'element'   => 'Earth',
            'planet'    => 'Saturn',
            'quality'   => 'Cardinal',
            'desc'      => 'Steadfast ambitious and built for the long climb — Capricorn scales the mountain of achievement one sure step at a time',
            'strengths' => "Disciplined & ambitious\nResponsible & reliable\nPatient & persistent\nStrategic thinker",
            'growth'    => "Can be overly serious\nWorkaholic tendencies\nEmotionally guarded",
            'prev'      => 'sagittarius',
            'next'      => 'aquarius',
            'banner'    => 'capricorn',
        ],
        [
            'title'     => 'Aquarius',
            'slug'      => 'aquarius',
            'glyph'     => '♒︎',
            'dates'     => 'Jan 20–Feb 18',
            'element'   => 'Air',
            'planet'    => 'Uranus/Saturn',
            'quality'   => 'Fixed',
            'desc'      => 'Visionary unconventional and ahead of its time — Aquarius carries the waters of knowledge to nourish the collective',
            'strengths' => "Progressive & original\nHumanitarian at heart\nIntellectually independent\nVisionary thinking",
            'growth'    => "Can be detached emotionally\nStubborn in ideals\nUnpredictable",
            'prev'      => 'capricorn',
            'next'      => 'pisces',
            'banner'    => 'aquarius',
        ],
        [
            'title'     => 'Pisces',
            'slug'      => 'pisces',
            'glyph'     => '♓︎',
            'dates'     => 'Feb 19–Mar 20',
            'element'   => 'Water',
            'planet'    => 'Neptune/Jupiter',
            'quality'   => 'Mutable',
            'desc'      => 'Dreamy compassionate and boundlessly imaginative — Pisces swims between worlds merging intuition with the infinite',
            'strengths' => "Compassionate & empathetic\nDeeply creative\nIntuitive & spiritual\nAdaptable & gentle",
            'growth'    => "Can be escapist\nOverly idealistic\nBoundary challenges",
            'prev'      => 'aquarius',
            'next'      => 'aries',
            'banner'    => 'pisces',
        ],
    ];

    foreach ( $signs as $sign ) {
        // Check if already exists.
        $existing = get_posts( [
            'post_type'      => 'alp_zodiac',
            'name'           => $sign['slug'],
            'posts_per_page' => 1,
            'post_status'    => 'publish',
        ] );
        if ( ! empty( $existing ) ) {
            continue;
        }

        $post_id = wp_insert_post( [
            'post_title'   => $sign['title'],
            'post_name'    => $sign['slug'],
            'post_type'    => 'alp_zodiac',
            'post_status'  => 'publish',
            'post_content' => '',
        ] );

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, 'alp_zodiac_glyph',     $sign['glyph'] );
            update_post_meta( $post_id, 'alp_zodiac_dates',     $sign['dates'] );
            update_post_meta( $post_id, 'alp_zodiac_element',   $sign['element'] );
            update_post_meta( $post_id, 'alp_zodiac_planet',    $sign['planet'] );
            update_post_meta( $post_id, 'alp_zodiac_quality',   $sign['quality'] );
            update_post_meta( $post_id, 'alp_zodiac_desc',      $sign['desc'] );
            update_post_meta( $post_id, 'alp_zodiac_strengths', $sign['strengths'] );
            update_post_meta( $post_id, 'alp_zodiac_growth',    $sign['growth'] );
            update_post_meta( $post_id, 'alp_zodiac_prev_sign', $sign['prev'] );
            update_post_meta( $post_id, 'alp_zodiac_next_sign', $sign['next'] );
            update_post_meta( $post_id, 'alp_zodiac_banner',    $sign['banner'] );
        }
    }
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
