<?php
/*
 * Template Name: Articles
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="articles"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Articles', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Astrological Insights & Knowledge', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Explore our library of articles on Vedic astrology, KP methods, planetary influences and more.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Articles', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <?php
    $args  = [ 'post_type' => 'post', 'posts_per_page' => 12, 'post_status' => 'publish', 'ignore_sticky_posts' => true ];
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : ?>
    <div class="card-grid c3">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <article class="s-card reveal">
        <?php
        $cats = get_the_category();
        if ( $cats ) : ?>
        <span class="pill" style="margin-bottom:var(--sp-3)"><?php echo esc_html( $cats[0]->name ); ?></span>
        <?php endif; ?>
        <h3><?php the_title(); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php echo esc_html( get_the_excerpt() ); ?></p>
        <a class="btn btn-outline mt-5" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read Article →', 'alp-astrology' ); ?></a>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <div class="card-grid c3">
      <?php
      $static = [
        [ 'Vedic Astrology', 'Understanding Your Ascendant (Lagna)', 'The Ascendant sets the tone for your entire chart. Discover how your rising sign shapes your approach to life, your appearance and your first impressions.' ],
        [ 'KP Astrology',    'KP Astrology: Precision Prediction',   'KP Astrology\'s Sub-lord theory offers remarkable precision in event timing. Learn the fundamentals and why it complements traditional Vedic methods.' ],
        [ 'Planets',         'Saturn\'s Return: A Cosmic Turning Point', 'Saturn completes its orbit every 29.5 years, triggering profound life shifts. Understanding your Saturn return can help you navigate this powerful cycle.' ],
        [ 'Houses',          'The 12 Houses of the Zodiac Explained',    'Each of the 12 houses governs a different sphere of life — from identity and finances to relationships and spirituality. A foundational guide.' ],
        [ 'Remedies',        'Planetary Remedies in Vedic Astrology',    'Gemstones, mantras, yantras and charitable acts — how traditional remedies can help mitigate challenging planetary placements.' ],
        [ 'Prediction',      'Dasha System: Timing Life Events',         'The Vimshottari Dasha system is the backbone of Vedic predictive astrology. Learn how planetary periods influence the unfolding of your destiny.' ],
      ];
      foreach ( $static as $a ) : ?>
      <article class="s-card reveal">
        <span class="pill" style="margin-bottom:var(--sp-3)"><?php echo esc_html( $a[0] ); ?></span>
        <h3><?php echo esc_html( $a[1] ); ?></h3>
        <p style="color:var(--fg2);margin-top:.5em;font-size:.95rem"><?php echo esc_html( $a[2] ); ?></p>
        <a class="btn btn-outline mt-5" href="#"><?php esc_html_e( 'Read Article →', 'alp-astrology' ); ?></a>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer();
