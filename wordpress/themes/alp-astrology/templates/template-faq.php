<?php
/*
 * Template Name: FAQ
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="faq"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'FAQ', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Frequently Asked Questions', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Answers to the questions we hear most often about astrology, our courses and our consultation process.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'FAQ', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap" style="max-width:800px;margin-inline:auto">
    <div class="faq-list" id="faqList">
      <?php
      $faqs = [
        [ 'What information do I need to book a consultation?',       'You will need your exact date of birth, time of birth (as accurate as possible) and place of birth. The more accurate your birth time, the more precise the reading.' ],
        [ 'How long does a consultation session last?',               'A standard consultation typically lasts 45–60 minutes. Extended sessions for in-depth chart analysis may take up to 90 minutes.' ],
        [ 'Can consultations be done online?',                        'Yes. We offer consultations via video call, WhatsApp video or phone call — making it accessible wherever you are in the world.' ],
        [ 'What is the difference between Vedic and KP Astrology?',  'Vedic Astrology is the ancient traditional system using sidereal zodiac and divisional charts. KP (Krishnamurti Paddhati) Astrology is a modern refined system derived from Vedic astrology that uses the Sub-lord theory for precise event timing. ALP Astrology integrates both systems.' ],
        [ 'Do I need any prior knowledge to join a course?',         'No prior knowledge is required for Level 1. Each course level builds on the previous, so completing them in order is recommended.' ],
        [ 'What language are the courses taught in?',                'Courses are primarily conducted in Tamil and English. Please contact us to confirm the language of your preferred batch.' ],
        [ 'How accurate is astrology?',                              'Accuracy depends greatly on the birth data quality and the astrologer\'s skill. Our 15+ years of practice and 500+ consultations show consistently high accuracy, especially with precise birth times using the KP system.' ],
        [ 'Can astrology predict the future?',                       'Astrology identifies trends, tendencies and probable timing of events based on planetary cycles. It is best understood as a guidance system — showing possibilities and patterns so you can make more informed choices.' ],
      ];
      foreach ( $faqs as $faq ) : ?>
      <div class="faq-item reveal">
        <button class="faq-q" aria-expanded="false"><?php echo esc_html( $faq[0] ); ?></button>
        <div class="faq-a"><p><?php echo esc_html( $faq[1] ); ?></p></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap center reveal" style="max-width:56ch;margin-inline:auto">
    <span class="eyebrow"><?php esc_html_e( 'Still have questions?', 'alp-astrology' ); ?></span>
    <h2 class="mt-3"><?php esc_html_e( 'Ask us directly', 'alp-astrology' ); ?></h2>
    <p class="lead mt-4"><?php esc_html_e( 'We\'re happy to answer any other questions before you book. Reach out on WhatsApp or via our contact form.', 'alp-astrology' ); ?></p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:var(--sp-6)">
      <a class="btn btn-primary btn-lg" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Ask on WhatsApp', 'alp-astrology' ); ?></a>
      <a class="btn btn-outline btn-lg" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact Form', 'alp-astrology' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer();
