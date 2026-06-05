<?php
/*
 * Template Name: Consultation
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="consultation" data-banner="scorpio"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Consultation', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Astrology crafted for your unique journey', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Personal, in-depth consultations guiding you through life\'s twists and turns with clarity and confidence.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Consultation', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <div class="center reveal" style="max-width:60ch;margin-inline:auto;margin-bottom:var(--sp-7)">
      <span class="eyebrow"><?php esc_html_e( 'What We Offer', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Our Consultation Services', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4"><?php esc_html_e( 'Each consultation is tailored to your unique birth chart and current planetary period.', 'alp-astrology' ); ?></p>
    </div>
    <div class="card-grid c2">
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18M5.6 5.6l12.8 12.8M18.4 5.6 5.6 18.4"/></svg></div>
        <h3><?php esc_html_e( 'Birth Chart Analysis', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'A comprehensive reading of your natal chart — planets, houses, signs and their combined influence on your personality and life path.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Full chart interpretation', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Planetary strengths & weaknesses', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Ascendant & Moon analysis', 'alp-astrology' ); ?></li>
        </ul>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg></div>
        <h3><?php esc_html_e( 'Career & Finance', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Identify your most favourable periods for career growth, business decisions, investments and financial planning.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Career direction guidance', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Business timing analysis', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Financial period forecasting', 'alp-astrology' ); ?></li>
        </ul>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
        <h3><?php esc_html_e( 'Marriage & Relationships', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Compatibility analysis, marriage timing and relationship guidance drawn from your chart and your partner\'s.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Compatibility analysis', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Marriage timing prediction', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Relationship remedies', 'alp-astrology' ); ?></li>
        </ul>
      </div>
      <div class="s-card reveal">
        <div class="s-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
        <h3><?php esc_html_e( 'Health & Wellness', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Astrological health analysis identifying vulnerable areas and periods, with remedial guidance for holistic wellbeing.', 'alp-astrology' ); ?></p>
        <ul class="feat-list mt-4" style="font-size:.9rem">
          <li><?php esc_html_e( 'Health period analysis', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Planetary remedies', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Wellness timing guidance', 'alp-astrology' ); ?></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap two-col">
    <div class="media reveal">
      <img src="https://www.alpastrology.org/static/media/photo6.47a104c6600c6d047d48.JPG" alt="<?php esc_attr_e( 'Consultation', 'alp-astrology' ); ?>" loading="lazy" decoding="async" onerror="this.closest('.media').classList.add('ph')">
      <span class="ph-glyph">✦</span>
    </div>
    <div class="reveal">
      <span class="eyebrow"><?php esc_html_e( 'How It Works', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Your consultation, step by step', 'alp-astrology' ); ?></h2>
      <ol style="list-style:none;display:flex;flex-direction:column;gap:1.1em;margin-top:var(--sp-5)">
        <?php
        $steps = [
          [ 'Book',     'Contact us via WhatsApp or the form below. Share your date, time and place of birth.' ],
          [ 'Prepare',  'Our astrologer studies your complete birth chart ahead of the session.' ],
          [ 'Consult',  'Attend your in-person or online session and receive personalised guidance.' ],
          [ 'Follow up','Receive written notes and remedies. We\'re available for follow-up questions.' ],
        ];
        foreach ( $steps as $i => $step ) : ?>
        <li style="display:flex;gap:1em;align-items:flex-start">
          <span style="flex:none;width:32px;height:32px;border-radius:50%;background:var(--grad-gold);color:#fff;display:grid;place-items:center;font-family:var(--font-display);font-weight:700"><?php echo $i + 1; ?></span>
          <span><strong><?php echo esc_html( $step[0] ); ?></strong> — <?php echo esc_html( $step[1] ); ?></span>
        </li>
        <?php endforeach; ?>
      </ol>
      <a class="btn btn-red mt-6" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Book Now on WhatsApp', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer();
