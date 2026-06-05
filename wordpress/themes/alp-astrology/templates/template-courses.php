<?php
/*
 * Template Name: Courses
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="courses" data-banner="leo"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Courses', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Learn Astrology from the Experts', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Structured, progressive training from beginner to master — blending traditional Vedic and KP techniques.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Courses', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap two-col">
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo3.cb6b1a8d110b94573c49.JPG" alt="<?php esc_attr_e( 'Astrology course', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Level 1', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'The Basic ALP Astrology Training Course', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Begin your journey into the cosmos. This foundational course introduces you to the core concepts of Vedic and KP astrology — planets, houses, signs and their interactions.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Introduction to planets, signs & houses', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Reading a basic birth chart', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Fundamentals of KP Astrology', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Practical chart exercises', 'alp-astrology' ); ?></li>
      </ul>
      <a class="btn btn-primary mt-6" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Enrol via WhatsApp', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap two-col media-after">
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Level 2', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'The Advanced ALP Astrology Training Course', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Deepen your understanding. This intermediate course covers advanced chart interpretation, transit analysis and predictive techniques.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Advanced planetary combinations (yogas)', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Dasha & transit prediction', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Divisional chart analysis', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Event timing methods', 'alp-astrology' ); ?></li>
      </ul>
      <a class="btn btn-primary mt-6" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Enrol via WhatsApp', 'alp-astrology' ); ?></a>
    </div>
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo6.47a104c6600c6d047d48.JPG" alt="<?php esc_attr_e( 'Advanced astrology course', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap two-col">
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo2.222e9ecb6244621582a1.JPG" alt="<?php esc_attr_e( 'Master astrology course', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Level 3', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( "The Master's ALP Astrology Training Course", 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Achieve mastery. This professional-level course prepares you to practice as a confident, skilled ALP astrologer — ready to guide others.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Professional chart consultation techniques', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Advanced KP Sub-lord theory', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Mundane & medical astrology', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Building your practice', 'alp-astrology' ); ?></li>
      </ul>
      <a class="btn btn-red mt-6" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Enrol via WhatsApp', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="cta-band reveal">
      <div style="position:relative;z-index:1">
        <h2><?php esc_html_e( 'Start your astrology journey today', 'alp-astrology' ); ?></h2>
        <p class="lead mt-3"><?php esc_html_e( 'Reach out via WhatsApp or contact us directly to find the right course for your level and goals.', 'alp-astrology' ); ?></p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:32px">
          <a class="btn btn-primary btn-lg" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Message on WhatsApp', 'alp-astrology' ); ?></a>
          <a class="btn btn-ghost-light btn-lg" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact Us', 'alp-astrology' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
