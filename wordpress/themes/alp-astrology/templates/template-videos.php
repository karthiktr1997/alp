<?php
/*
 * Template Name: Videos
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="videos" data-banner="gemini"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Videos', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Watch & Learn Astrology', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Educational video content covering zodiac signs, planetary influences, chart reading and astrological predictions.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Videos', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <div class="card-grid c3">
      <?php
      $vids = [
        [ 'Introduction to Vedic Astrology',  'A beginner-friendly overview of the core principles of Vedic astrology.' ],
        [ 'How to Read Your Birth Chart',     'Step-by-step guide to interpreting the key elements of your natal chart.' ],
        [ 'KP Astrology Sub-lord Theory',     'Deep dive into KP\'s Sub-lord system for precision predictions.' ],
      ];
      foreach ( $vids as $v ) : ?>
      <div class="s-card reveal" style="padding:0;overflow:hidden">
        <div style="background:var(--grad-cosmic);aspect-ratio:16/9;display:grid;place-items:center;position:relative">
          <svg width="56" height="56" viewBox="0 0 24 24" fill="rgba(244,161,28,.9)" style="filter:drop-shadow(0 0 12px rgba(244,161,28,.5))"><circle cx="12" cy="12" r="11"/><polygon points="10 8 16 12 10 16" fill="#fff"/></svg>
        </div>
        <div style="padding:var(--sp-5)">
          <h3><?php echo esc_html( $v[0] ); ?></h3>
          <p style="color:var(--fg2);font-size:.9rem;margin-top:.5em"><?php echo esc_html( $v[1] ); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="center mt-7 reveal">
      <p class="lead" style="color:var(--fg2)"><?php esc_html_e( 'More videos available on our YouTube channel.', 'alp-astrology' ); ?></p>
      <a class="btn btn-primary mt-4" href="https://www.youtube.com/@alpastrology" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Visit YouTube Channel', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer();
