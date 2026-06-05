<?php
/*
 * Template Name: Success Stories
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="success"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Success Stories', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Transformations Through Astrology', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Real outcomes from real clients — career breakthroughs, relationship clarity and life-changing guidance from ALP Astrology.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Success Stories', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap" style="max-width:860px;margin-inline:auto;display:flex;flex-direction:column;gap:var(--sp-7)">
    <?php
    $stories = [
      [ 'A', 'Career Change & Financial Turnaround', 'Career · Financial Growth',
        'After a difficult period of career stagnation, a consultation with ALP Astrology revealed a highly favourable Jupiter transit coming in 6 months. Acting on the guidance, the client made a calculated career move — and received a significant promotion exactly within the predicted period.',
        '"The accuracy was astonishing. The astrologer gave me a specific time window, and it happened exactly as predicted."' ],
      [ 'P', 'Marriage Guidance & Compatibility', 'Marriage · Relationships',
        'A client was uncertain about proceeding with a marriage proposal. A detailed compatibility analysis and marriage timing consultation from ALP Astrology provided clarity and confidence. The marriage took place during the predicted auspicious period and the relationship has flourished.',
        '"We are so grateful. The reading gave us both clarity and confidence. Two years married and deeply happy."' ],
      [ 'K', 'Health Recovery Prediction', 'Health · Remedies',
        'During a period of health challenges, a client sought guidance. The astrologer identified a challenging Saturn transit affecting the 6th house but also predicted a recovery period beginning within 4 months. The client recovered on schedule, crediting both medical treatment and the planetary remedies advised.',
        '"The remedies and the timeline prediction gave me hope when I needed it most. I recovered exactly when predicted."' ],
    ];
    foreach ( $stories as $s ) : ?>
    <div class="s-card reveal" style="display:grid;grid-template-columns:auto 1fr;gap:var(--sp-5);align-items:start">
      <span style="width:64px;height:64px;border-radius:50%;background:var(--grad-gold);color:#fff;display:grid;place-items:center;font-family:var(--font-display);font-weight:800;font-size:1.6rem;border:3px solid var(--saffron);flex:none"><?php echo esc_html( $s[0] ); ?></span>
      <div>
        <h3><?php echo esc_html( $s[1] ); ?></h3>
        <p class="mt-3" style="color:var(--fg2)"><?php echo esc_html( $s[3] ); ?></p>
        <p class="mt-3" style="color:var(--fg2)"><strong><?php echo esc_html( $s[4] ); ?></strong></p>
        <span class="eyebrow mt-4" style="display:inline-block"><?php echo esc_html( $s[2] ); ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<?php get_footer();
