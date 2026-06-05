<?php
/*
 * Template Name: About
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="about" data-banner="sagittarius"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'About ALP Astrology', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Revealing fundamentals, navigating toward a brighter future', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'A lifetime achievement of commitment — for the greater goodness of human society.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'About', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap two-col">
    <div class="media reveal" style="position:relative">
      <img src="https://www.alpastrology.org/static/media/photo2.222e9ecb6244621582a1.JPG" alt="<?php esc_attr_e( 'Astrology chart and cosmic elements', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Who We Are', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Guidance rooted in wisdom, shaped for today', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'At ALP Astrology, we empower individuals with deep, meaningful insights by blending traditional astrology with modern psychological understanding.', 'alp-astrology' ); ?></p>
      <p class="mt-4" style="color:var(--fg2)"><?php esc_html_e( 'Our vision is a future where every home has access to a skilled ALP astrologer — making astrology a structured and trusted part of personal growth.', 'alp-astrology' ); ?></p>
      <ul class="feat-list mt-5">
        <li><?php esc_html_e( 'Traditional Vedic & KP Predictive Systems', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Modern psychological interpretation', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( 'Structured learning from beginner to master', 'alp-astrology' ); ?></li>
        <li><?php esc_html_e( '1-to-1 personalised guidance', 'alp-astrology' ); ?></li>
      </ul>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="center reveal" style="max-width:60ch;margin-inline:auto;margin-bottom:var(--sp-7)">
      <span class="eyebrow"><?php esc_html_e( 'Our Vision', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'An astrologer in every home', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'We believe astrology should be accessible to everyone. Our structured courses and personalised consultations make it possible for anyone to benefit from the wisdom of the stars.', 'alp-astrology' ); ?></p>
    </div>
    <div class="card-grid c3">
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18" stroke-width="1.4"/></svg></div>
        <h3><?php esc_html_e( 'Traditional Wisdom', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Rooted in authentic Vedic and KP astrological traditions, preserving time-tested predictive methods.', 'alp-astrology' ); ?></p>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3><?php esc_html_e( 'Trusted Guidance', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( '500+ satisfied clients and 4.7 Google rating — accuracy and integrity you can rely on.', 'alp-astrology' ); ?></p>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h12a3 3 0 0 1 3 3v11a2.5 2.5 0 0 0-2.5-2.5H4z"/><path d="M4 5a2.5 2.5 0 0 0-2.5 2.5V19a2.5 2.5 0 0 1 2.5-2.5"/></svg></div>
        <h3><?php esc_html_e( 'Structured Learning', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Three-level course curriculum taking you from absolute beginner to confident practitioner.', 'alp-astrology' ); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap two-col media-after">
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'Our Approach', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Blending tradition with modern insight', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'We combine the precision of KP Astrology with the depth of Vedic traditions. Our methods are tested against real-life events, refined over 15+ years of practice and teaching.', 'alp-astrology' ); ?></p>
      <p class="mt-4" style="color:var(--fg2)"><?php esc_html_e( 'Whether you seek answers about career, relationships, health or your life\'s deeper purpose — our astrologers provide guidance grounded in both ancient wisdom and contemporary understanding.', 'alp-astrology' ); ?></p>
      <a class="btn btn-primary mt-6" href="<?php echo esc_url( home_url( '/consultation' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?></a>
    </div>
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo6.47a104c6600c6d047d48.JPG" alt="<?php esc_attr_e( 'Consultation session', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
  </div>
</section>

<section style="background:var(--grad-night);color:var(--fg-inv)" class="section-pad">
  <div class="wrap">
    <div class="stat-row">
      <div class="stat reveal"><b data-count="500" data-suffix="+">0+</b><span style="color:var(--fg-inv-soft)"><?php esc_html_e( 'Clients Served', 'alp-astrology' ); ?></span></div>
      <div class="stat reveal"><b data-count="286" data-suffix="+">0+</b><span style="color:var(--fg-inv-soft)"><?php esc_html_e( 'Google Reviews', 'alp-astrology' ); ?></span></div>
      <div class="stat reveal"><b data-count="15" data-suffix="+">0+</b><span style="color:var(--fg-inv-soft)"><?php esc_html_e( 'Years Experience', 'alp-astrology' ); ?></span></div>
      <div class="stat reveal"><b data-count="3">0</b><span style="color:var(--fg-inv-soft)"><?php esc_html_e( 'Course Levels', 'alp-astrology' ); ?></span></div>
    </div>
  </div>
</section>

<?php get_footer();
