<?php
/*
 * Template Name: Testimonials
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="testimonials"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Testimonials', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'What Our Clients Say', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Real experiences from those who\'ve found clarity, guidance and transformation through ALP Astrology.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Testimonials', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <div style="display:inline-flex;align-items:center;gap:.6em;background:#fff;border:1px solid var(--border-strong);padding:.5em 1.05em;border-radius:var(--r-pill);box-shadow:var(--shadow-xs);margin-bottom:var(--sp-7)">
      <span style="color:var(--saffron);letter-spacing:.1em">★★★★★</span>
      <span style="font-weight:800;color:var(--ink)">4.7</span>
      <span style="color:var(--fg2);font-size:.9rem"><?php esc_html_e( '· 286+ Google reviews', 'alp-astrology' ); ?></span>
    </div>
    <?php
    $tq = new WP_Query( [ 'post_type' => 'alp_testimonial', 'posts_per_page' => 8, 'post_status' => 'publish' ] );
    if ( $tq->have_posts() ) : ?>
    <div class="card-grid c2">
      <?php while ( $tq->have_posts() ) : $tq->the_post();
        $initial = strtoupper( substr( get_the_title(), 0, 1 ) ); ?>
      <div class="s-card reveal">
        <div style="font-family:var(--font-display);font-size:3rem;color:var(--saffron);line-height:.7;opacity:.5">"</div>
        <blockquote style="font-family:var(--font-serif);font-size:1.08rem;color:var(--ink);font-style:italic;margin:var(--sp-3) 0 var(--sp-4)"><?php echo wp_kses_post( get_the_content() ); ?></blockquote>
        <div style="display:flex;align-items:center;gap:.8em">
          <span style="width:44px;height:44px;border-radius:50%;background:var(--grad-gold);color:#fff;display:grid;place-items:center;font-family:var(--font-display);font-weight:700;font-size:1.1rem;border:2px solid var(--saffron)"><?php echo esc_html( $initial ); ?></span>
          <span><strong><?php the_title(); ?></strong><br><span style="font-size:.85rem;color:var(--fg2)"><?php esc_html_e( 'ALP Astrology · Chennai', 'alp-astrology' ); ?></span></span>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else :
      $static = [
        [ 'G', 'ALP Astrology is excellent! The team has deep knowledge about astrology and spirituality. They answer all my questions clearly, and I feel genuinely guided in my life. The atmosphere is warm and welcoming.' ],
        [ 'R', 'The consultation was eye-opening. The astrologer explained my birth chart so clearly and the predictions were remarkably accurate. Highly recommend to anyone seeking genuine astrological guidance.' ],
        [ 'S', 'I have been following ALP Astrology for over two years. The courses are beautifully structured and the consultations are always on point. The level of dedication and professionalism is unmatched.' ],
        [ 'M', 'Very professional and accurate. My career prediction came true within the time frame given. Will definitely come back for the next consultation. Thank you ALP Astrology!' ],
      ]; ?>
    <div class="card-grid c2">
      <?php foreach ( $static as $t ) : ?>
      <div class="s-card reveal">
        <div style="font-family:var(--font-display);font-size:3rem;color:var(--saffron);line-height:.7;opacity:.5">"</div>
        <blockquote style="font-family:var(--font-serif);font-size:1.08rem;color:var(--ink);font-style:italic;margin:var(--sp-3) 0 var(--sp-4)"><?php echo esc_html( $t[1] ); ?></blockquote>
        <div style="display:flex;align-items:center;gap:.8em">
          <span style="width:44px;height:44px;border-radius:50%;background:var(--grad-gold);color:#fff;display:grid;place-items:center;font-family:var(--font-display);font-weight:700;font-size:1.1rem;border:2px solid var(--saffron)"><?php echo esc_html( $t[0] ); ?></span>
          <span><strong><?php esc_html_e( 'Verified Google Review', 'alp-astrology' ); ?></strong><br><span style="font-size:.85rem;color:var(--fg2)"><?php esc_html_e( 'ALP Astrology · Chennai', 'alp-astrology' ); ?></span></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer();
