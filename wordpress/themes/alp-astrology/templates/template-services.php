<?php
/*
 * Template Name: Services
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="services" data-banner="capricorn"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Services & Offerings', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Our Services & Offerings', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Comprehensive astrological solutions — from expert consultations to structured learning, software tools and authoritative books.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Services', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap two-col">
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo6.47a104c6600c6d047d48.JPG" alt="<?php esc_attr_e( 'Consultation service', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Consultation', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Personal Astrological Consultation', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Professional one-to-one consultations covering birth chart analysis, career, relationships, health and life guidance.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Birth Chart Analysis', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Career & Financial Guidance', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Marriage & Compatibility', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Health & Wellness Remedies', 'alp-astrology' ); ?></li>
      </ul>
      <a class="btn btn-primary mt-6" href="<?php echo esc_url( home_url( '/consultation' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap two-col media-after">
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Courses', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Astrology Training Courses', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Three-level structured courses designed to take you from beginner to professional practitioner.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Basic: foundations, planets, signs, houses', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Advanced: yogas, dashas, transits', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Master: professional practice, KP sublord', 'alp-astrology' ); ?></li>
      </ul>
      <a class="btn btn-primary mt-6" href="<?php echo esc_url( home_url( '/courses' ) ); ?>"><?php esc_html_e( 'View Courses', 'alp-astrology' ); ?></a>
    </div>
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo3.cb6b1a8d110b94573c49.JPG" alt="<?php esc_attr_e( 'Astrology courses', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <div class="card-grid c2">
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
        <h3><?php esc_html_e( 'Astrology Software', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Advanced astrology software built for accuracy — professional chart generation, divisional charts, planetary calculations and predictive tools.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Professional-grade tools', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Divisional chart support', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Precise planetary calculations', 'alp-astrology' ); ?></li>
        </ul>
        <a class="btn btn-outline mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Enquire via WhatsApp', 'alp-astrology' ); ?></a>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <h3><?php esc_html_e( 'Astrology Books', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Comprehensive astrology books offering clear concepts, practical examples and deep knowledge for learners at every level.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Simplified concepts', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Practical case examples', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Expert-authored content', 'alp-astrology' ); ?></li>
        </ul>
        <a class="btn btn-outline mt-5" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Enquire via WhatsApp', 'alp-astrology' ); ?></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
