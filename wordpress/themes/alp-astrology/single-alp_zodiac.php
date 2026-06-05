<?php
if ( ! defined( 'ABSPATH' ) ) exit;

the_post();

$id       = get_the_ID();
$name     = get_the_title();
$slug     = get_post_field( 'post_name', $id );
$glyph    = get_post_meta( $id, 'alp_zodiac_glyph', true );
$dates    = get_post_meta( $id, 'alp_zodiac_dates', true );
$element  = get_post_meta( $id, 'alp_zodiac_element', true );
$planet   = get_post_meta( $id, 'alp_zodiac_planet', true );
$quality  = get_post_meta( $id, 'alp_zodiac_quality', true );
$desc     = get_post_meta( $id, 'alp_zodiac_desc', true );
$banner   = get_post_meta( $id, 'alp_zodiac_banner', true ) ?: $slug;
$prev     = get_post_meta( $id, 'alp_zodiac_prev_sign', true );
$next     = get_post_meta( $id, 'alp_zodiac_next_sign', true );
$strengths_raw = get_post_meta( $id, 'alp_zodiac_strengths', true );
$growth_raw    = get_post_meta( $id, 'alp_zodiac_growth', true );
$strengths = array_filter( array_map( 'trim', explode( "\n", $strengths_raw ) ) );
$growth    = array_filter( array_map( 'trim', explode( "\n", $growth_raw ) ) );

$prev_data = $prev && function_exists( 'alp_get_zodiac_data' ) ? alp_get_zodiac_data( $prev ) : null;
$next_data = $next && function_exists( 'alp_get_zodiac_data' ) ? alp_get_zodiac_data( $next ) : null;

add_filter( 'alp_body_data', function () use ( $banner ) {
    return 'data-page="zodiac" data-banner="' . esc_attr( $banner ) . '"';
} );

get_header();
?>

<section class="page-hero">
  <div class="wrap" style="text-align:center">
    <div class="zhero-glyph"><?php echo esc_html( $glyph ); ?></div>
    <h1 class="mt-3"><?php echo esc_html( $name ); ?></h1>
    <?php if ( $dates ) : ?>
    <p class="lead mt-3" style="color:var(--fg-inv-soft)"><?php echo esc_html( $dates ); ?></p>
    <?php endif; ?>
    <div class="zchips">
      <?php if ( $element ) : ?>
      <span class="zchip">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/></svg>
        <?php echo esc_html( $element ); ?>
      </span>
      <?php endif; ?>
      <?php if ( $planet ) : ?>
      <span class="zchip">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="2" x2="12" y2="7"/><line x1="12" y1="17" x2="12" y2="22"/><line x1="2" y1="12" x2="7" y2="12"/><line x1="17" y1="12" x2="22" y2="12"/></svg>
        <?php echo esc_html( $planet ); ?>
      </span>
      <?php endif; ?>
      <?php if ( $quality ) : ?>
      <span class="zchip">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        <?php echo esc_html( $quality ); ?>
      </span>
      <?php endif; ?>
    </div>
    <div class="crumbs" style="justify-content:center;display:flex">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a>
      &nbsp;/&nbsp;
      <a href="<?php echo esc_url( home_url( '/horoscope' ) ); ?>"><?php esc_html_e( 'Horoscope', 'alp-astrology' ); ?></a>
      &nbsp;/&nbsp; <?php echo esc_html( $name ); ?>
    </div>
  </div>
</section>

<?php if ( $desc ) : ?>
<section class="section-pad" style="text-align:center">
  <div class="wrap" style="max-width:66ch;margin-inline:auto">
    <p class="lead reveal" style="font-family:var(--font-serif);font-size:1.2rem;font-style:italic;color:var(--fg2)"><?php echo esc_html( $desc ); ?></p>
  </div>
</section>
<?php endif; ?>

<?php if ( ! empty( $strengths ) || ! empty( $growth ) ) : ?>
<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="card-grid c2">
      <?php if ( ! empty( $strengths ) ) : ?>
      <div class="s-card reveal">
        <div class="s-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        <h3><?php esc_html_e( 'Strengths', 'alp-astrology' ); ?></h3>
        <ul class="feat-list mt-4">
          <?php foreach ( $strengths as $s ) : ?>
          <li><?php echo esc_html( $s ); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
      <?php if ( ! empty( $growth ) ) : ?>
      <div class="s-card reveal">
        <div class="s-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3><?php esc_html_e( 'Growth Areas', 'alp-astrology' ); ?></h3>
        <ul class="feat-list mt-4">
          <?php foreach ( $growth as $g ) : ?>
          <li><?php echo esc_html( $g ); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( $element || $planet || $quality ) : ?>
<section class="section-pad">
  <div class="wrap">
    <div class="center reveal" style="margin-bottom:var(--sp-6)">
      <span class="eyebrow"><?php esc_html_e( 'Sign Qualities', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php printf( esc_html__( 'The essence of %s', 'alp-astrology' ), esc_html( $name ) ); ?></h2>
    </div>
    <div class="card-grid c3">
      <?php if ( $element ) : ?>
      <div class="s-card reveal" style="text-align:center">
        <div class="s-icon" style="margin-inline:auto">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h3><?php esc_html_e( 'Element', 'alp-astrology' ); ?></h3>
        <p style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;color:var(--saffron-deep);margin-top:.5em"><?php echo esc_html( $element ); ?></p>
      </div>
      <?php endif; ?>
      <?php if ( $planet ) : ?>
      <div class="s-card reveal" style="text-align:center">
        <div class="s-icon" style="margin-inline:auto">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
        </div>
        <h3><?php esc_html_e( 'Ruling Planet', 'alp-astrology' ); ?></h3>
        <p style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;color:var(--saffron-deep);margin-top:.5em"><?php echo esc_html( $planet ); ?></p>
      </div>
      <?php endif; ?>
      <?php if ( $quality ) : ?>
      <div class="s-card reveal" style="text-align:center">
        <div class="s-icon" style="margin-inline:auto">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        </div>
        <h3><?php esc_html_e( 'Quality', 'alp-astrology' ); ?></h3>
        <p style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;color:var(--saffron-deep);margin-top:.5em"><?php echo esc_html( $quality ); ?></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="cta-band reveal">
      <div style="position:relative;z-index:1">
        <h2><?php printf( esc_html__( 'Get your personalised %s reading', 'alp-astrology' ), esc_html( $name ) ); ?></h2>
        <p class="lead mt-3"><?php esc_html_e( 'Your sun sign is just the beginning. A full birth chart consultation reveals your complete cosmic blueprint.', 'alp-astrology' ); ?></p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:32px">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/consultation' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?></a>
          <a class="btn btn-ghost-light btn-lg" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chat on WhatsApp', 'alp-astrology' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ( $prev_data || $next_data ) : ?>
<section class="section-pad">
  <div class="wrap">
    <nav class="znav" aria-label="<?php esc_attr_e( 'Zodiac sign navigation', 'alp-astrology' ); ?>">
      <?php if ( $prev_data ) : ?>
      <a href="<?php echo esc_url( $prev_data['permalink'] ); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <?php echo esc_html( $prev_data['glyph'] ) . ' ' . esc_html( $prev_data['name'] ); ?>
      </a>
      <?php else : ?>
      <span></span>
      <?php endif; ?>
      <?php if ( $next_data ) : ?>
      <a href="<?php echo esc_url( $next_data['permalink'] ); ?>">
        <?php echo esc_html( $next_data['glyph'] ) . ' ' . esc_html( $next_data['name'] ); ?>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <?php endif; ?>
    </nav>
  </div>
</section>
<?php endif; ?>

<?php get_footer();
