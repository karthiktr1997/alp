<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$sign_slug = get_post_meta( get_the_ID(), 'alp_zodiac_slug', true );
$banner    = $sign_slug ?: get_post_field( 'post_name', get_the_ID() );
add_filter( 'alp_body_data', function () use ( $banner ) {
    return 'data-page="horoscope" data-banner="' . esc_attr( $banner ) . '"';
} );

get_header();

$glyph    = get_post_meta( get_the_ID(), 'alp_zodiac_glyph', true )    ?: '✦';
$dates    = get_post_meta( get_the_ID(), 'alp_zodiac_date_range', true ) ?: '';
$element  = get_post_meta( get_the_ID(), 'alp_zodiac_element', true )   ?: '';
$planet   = get_post_meta( get_the_ID(), 'alp_zodiac_planet', true )    ?: '';
$quality  = get_post_meta( get_the_ID(), 'alp_zodiac_quality', true )   ?: '';
$strengths = get_post_meta( get_the_ID(), 'alp_zodiac_strengths', true );
$growth    = get_post_meta( get_the_ID(), 'alp_zodiac_growth', true );
$prev_slug = get_post_meta( get_the_ID(), 'alp_zodiac_prev', true );
$next_slug = get_post_meta( get_the_ID(), 'alp_zodiac_next', true );
$desc      = get_post_meta( get_the_ID(), 'alp_zodiac_desc', true ) ?: get_the_excerpt();

// Resolve prev/next posts
$prev_post = $prev_slug ? get_posts( [ 'post_type' => 'alp_zodiac', 'meta_key' => 'alp_zodiac_slug', 'meta_value' => $prev_slug, 'posts_per_page' => 1 ] ) : [];
$next_post = $next_slug ? get_posts( [ 'post_type' => 'alp_zodiac', 'meta_key' => 'alp_zodiac_slug', 'meta_value' => $next_slug, 'posts_per_page' => 1 ] ) : [];

$prev_glyph = $prev_post ? get_post_meta( $prev_post[0]->ID, 'alp_zodiac_glyph', true ) : '';
$next_glyph = $next_post ? get_post_meta( $next_post[0]->ID, 'alp_zodiac_glyph', true ) : '';

if ( ! is_array( $strengths ) ) $strengths = array_filter( explode( "\n", $strengths ?: '' ) );
if ( ! is_array( $growth ) )    $growth    = array_filter( explode( "\n", $growth    ?: '' ) );
?>

<section class="page-hero">
  <div class="wrap">
    <div class="zhero-glyph"><?php echo esc_html( $glyph ); ?></div>
    <?php if ( $dates ) : ?><span class="eyebrow mt-3" style="color:var(--cos-gold)"><?php echo esc_html( $dates ); ?></span><?php endif; ?>
    <h1 class="mt-3"><?php the_title(); ?></h1>
    <?php if ( $desc ) : ?><p class="lead mt-3"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
    <div class="zchips">
      <?php if ( $element ) : ?>
      <span class="zchip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2s5 5 5 10a5 5 0 0 1-10 0c0-2 1-3.5 2-5"/></svg><?php echo esc_html( $element ); ?></span>
      <?php endif; if ( $planet ) : ?>
      <span class="zchip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="6"/><ellipse cx="12" cy="12" rx="11" ry="4" transform="rotate(-25 12 12)"/></svg><?php echo esc_html( $planet ); ?></span>
      <?php endif; if ( $quality ) : ?>
      <span class="zchip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg><?php echo esc_html( $quality ); ?></span>
      <?php endif; ?>
    </div>
    <div class="crumbs" style="margin-top:var(--sp-4)">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp;
      <a href="<?php echo esc_url( home_url( '/horoscope' ) ); ?>"><?php esc_html_e( 'Horoscope', 'alp-astrology' ); ?></a> &nbsp;/&nbsp;
      <?php the_title(); ?>
    </div>
  </div>
</section>

<?php if ( $strengths || $growth ) : ?>
<section class="section-pad">
  <div class="wrap card-grid c2">
    <?php if ( $strengths ) : ?>
    <div class="s-card reveal">
      <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2s5 5 5 10a5 5 0 0 1-10 0c0-2 1-3.5 2-5"/></svg></div>
      <h3><?php esc_html_e( 'Strengths', 'alp-astrology' ); ?></h3>
      <ul class="feat-list mt-4" style="font-size:.97rem">
        <?php foreach ( $strengths as $s ) : ?><li><?php echo esc_html( trim( $s ) ); ?></li><?php endforeach; ?>
      </ul>
    </div>
    <?php endif; if ( $growth ) : ?>
    <div class="s-card reveal">
      <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="6"/><ellipse cx="12" cy="12" rx="11" ry="4" transform="rotate(-25 12 12)"/></svg></div>
      <h3><?php esc_html_e( 'Growth Areas', 'alp-astrology' ); ?></h3>
      <ul class="feat-list mt-4" style="font-size:.97rem">
        <?php foreach ( $growth as $g ) : ?><li><?php echo esc_html( trim( $g ) ); ?></li><?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php if ( $element || $planet || $quality ) : ?>
<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="center reveal" style="max-width:58ch;margin-inline:auto;margin-bottom:var(--sp-6)">
      <span class="eyebrow"><?php esc_html_e( 'At a Glance', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php printf( esc_html__( 'The essence of %s', 'alp-astrology' ), get_the_title() ); ?></h2>
    </div>
    <div class="card-grid c3">
      <?php if ( $element ) : ?>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2s5 5 5 10a5 5 0 0 1-10 0c0-2 1-3.5 2-5"/></svg></div>
        <h3><?php esc_html_e( 'Element', 'alp-astrology' ); ?></h3><p><?php echo esc_html( $element ); ?></p>
      </div>
      <?php endif; if ( $planet ) : ?>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="6"/><ellipse cx="12" cy="12" rx="11" ry="4" transform="rotate(-25 12 12)"/></svg></div>
        <h3><?php esc_html_e( 'Ruling Planet', 'alp-astrology' ); ?></h3><p><?php echo esc_html( $planet ); ?></p>
      </div>
      <?php endif; if ( $quality ) : ?>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div>
        <h3><?php esc_html_e( 'Quality', 'alp-astrology' ); ?></h3><p><?php echo esc_html( $quality ); ?></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section-pad">
  <div class="wrap">
    <div class="cta-band reveal">
      <div style="position:relative;z-index:1">
        <h2><?php printf( esc_html__( 'Discover your full %s chart', 'alp-astrology' ), get_the_title() ); ?></h2>
        <p class="lead mt-3"><?php esc_html_e( 'Sun-sign traits are just the beginning. A personal consultation reads your complete birth chart for guidance made just for you.', 'alp-astrology' ); ?></p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:32px">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/consultation' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?></a>
          <a class="btn btn-ghost-light btn-lg" href="<?php echo esc_url( home_url( '/horoscope' ) ); ?>"><?php esc_html_e( 'All Zodiac Signs', 'alp-astrology' ); ?></a>
        </div>
      </div>
    </div>
    <div class="znav mt-7">
      <?php if ( $prev_post ) : ?>
      <a href="<?php echo esc_url( get_permalink( $prev_post[0]->ID ) ); ?>">← <?php echo esc_html( $prev_glyph ); ?> <?php echo esc_html( $prev_post[0]->post_title ); ?></a>
      <?php else : ?><span></span><?php endif; ?>
      <?php if ( $next_post ) : ?>
      <a href="<?php echo esc_url( get_permalink( $next_post[0]->ID ) ); ?>"><?php echo esc_html( $next_post[0]->post_title ); ?> <?php echo esc_html( $next_glyph ); ?> →</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer();
