<?php
/*
 * Template Name: Events
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="events" data-banner="aquarius"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Events', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Workshops, Seminars & Live Sessions', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Join ALP Astrology\'s workshops, group learning sessions and live prediction events — online and in Chennai.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Events', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <?php
    $eq = new WP_Query( [ 'post_type' => 'alp_event', 'posts_per_page' => 9, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC' ] );
    if ( $eq->have_posts() ) : ?>
    <div class="card-grid c3">
      <?php while ( $eq->have_posts() ) : $eq->the_post(); ?>
      <div class="s-card reveal" style="border-top:3px solid var(--saffron)">
        <span class="pill" style="margin-bottom:var(--sp-3)"><?php esc_html_e( 'Event', 'alp-astrology' ); ?></span>
        <h3><?php the_title(); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php echo esc_html( get_the_excerpt() ); ?></p>
        <a class="btn btn-primary mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Register via WhatsApp', 'alp-astrology' ); ?></a>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <div class="card-grid c3">
      <div class="s-card reveal" style="border-top:3px solid var(--saffron)">
        <span class="pill" style="margin-bottom:var(--sp-3)"><?php esc_html_e( 'Upcoming', 'alp-astrology' ); ?></span>
        <h3><?php esc_html_e( 'Beginner Astrology Workshop', 'alp-astrology' ); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php esc_html_e( 'A full-day hands-on workshop covering the foundations of Vedic astrology. Perfect for complete beginners.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.85rem">
          <li><?php esc_html_e( 'Planets, signs & houses basics', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Reading your own chart', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Q&A with the astrologer', 'alp-astrology' ); ?></li>
        </ul>
        <a class="btn btn-primary mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Register via WhatsApp', 'alp-astrology' ); ?></a>
      </div>
      <div class="s-card reveal" style="border-top:3px solid var(--saffron)">
        <span class="pill" style="margin-bottom:var(--sp-3)"><?php esc_html_e( 'Upcoming', 'alp-astrology' ); ?></span>
        <h3><?php esc_html_e( 'KP Astrology Seminar', 'alp-astrology' ); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php esc_html_e( 'An intensive seminar on the KP Sub-lord system — prediction techniques and case studies from real charts.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.85rem">
          <li><?php esc_html_e( 'Sub-lord theory deep-dive', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Event timing case studies', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Practical exercises', 'alp-astrology' ); ?></li>
        </ul>
        <a class="btn btn-primary mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Register via WhatsApp', 'alp-astrology' ); ?></a>
      </div>
      <div class="s-card reveal">
        <span class="pill" style="margin-bottom:var(--sp-3);background:var(--bg-cream)"><?php esc_html_e( 'Past', 'alp-astrology' ); ?></span>
        <h3><?php esc_html_e( 'Annual Predictions Live', 'alp-astrology' ); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php esc_html_e( 'Annual planetary overview and predictions for all 12 zodiac signs — recorded session available on request.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.85rem">
          <li><?php esc_html_e( 'Year-ahead planetary transits', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Sign-by-sign predictions', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Career & relationship highlights', 'alp-astrology' ); ?></li>
        </ul>
        <a class="btn btn-outline mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Request Recording', 'alp-astrology' ); ?></a>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap center reveal" style="max-width:56ch;margin-inline:auto">
    <span class="eyebrow"><?php esc_html_e( 'Stay Updated', 'alp-astrology' ); ?></span>
    <h2 class="mt-3"><?php esc_html_e( 'Never miss an event', 'alp-astrology' ); ?></h2>
    <p class="lead mt-4"><?php esc_html_e( 'Follow us on WhatsApp or subscribe to our newsletter for advance notice of upcoming workshops and seminars.', 'alp-astrology' ); ?></p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:var(--sp-6)">
      <a class="btn btn-primary btn-lg" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Follow on WhatsApp', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer();
