<?php
/*
 * Template Name: Contact
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="contact"'; } );
get_header(); ?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Contact', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Get in Touch with ALP Astrology', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Have a question or need personalised guidance? Reach out — we\'d love to help.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Contact', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap contact-grid">

    <div class="contact-info reveal">
      <div class="ci-item">
        <span class="ci-i"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg></span>
        <div>
          <h4><?php esc_html_e( 'Email', 'alp-astrology' ); ?></h4>
          <p><a href="mailto:alpastrology@gmail.com">alpastrology@gmail.com</a><br><a href="mailto:alpastrologyoffice@gmail.com">alpastrologyoffice@gmail.com</a></p>
        </div>
      </div>
      <div class="ci-item">
        <span class="ci-i"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
        <div>
          <h4><?php esc_html_e( 'Phone', 'alp-astrology' ); ?></h4>
          <p><a href="tel:+919786556156">+91 9786556156</a></p>
        </div>
      </div>
      <div class="ci-item">
        <span class="ci-i"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
        <div>
          <h4><?php esc_html_e( 'Location', 'alp-astrology' ); ?></h4>
          <p><?php esc_html_e( 'F2, 1st Floor, Shiva Homes, Jayalakshmi Nagar, Anandha Sayanam, Moulivakkam, Chennai, Tamil Nadu 600116', 'alp-astrology' ); ?></p>
        </div>
      </div>
      <div class="ci-item">
        <span class="ci-i"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
        <div>
          <h4><?php esc_html_e( 'Hours', 'alp-astrology' ); ?></h4>
          <p><?php esc_html_e( 'Mon – Sat: 9:00 am – 7:00 pm', 'alp-astrology' ); ?><br><?php esc_html_e( 'Sunday: By appointment', 'alp-astrology' ); ?></p>
        </div>
      </div>
      <a class="btn btn-red mt-3" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer" style="align-self:flex-start">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php esc_html_e( 'Chat on WhatsApp', 'alp-astrology' ); ?>
      </a>
    </div>

    <form class="contact-form reveal" id="alpContactForm" novalidate>
      <div class="form-row">
        <div class="field">
          <label for="cf-name"><?php esc_html_e( 'Full Name', 'alp-astrology' ); ?></label>
          <input type="text" id="cf-name" name="name" placeholder="<?php esc_attr_e( 'Your name', 'alp-astrology' ); ?>" required>
        </div>
        <div class="field">
          <label for="cf-email"><?php esc_html_e( 'Email Address', 'alp-astrology' ); ?></label>
          <input type="email" id="cf-email" name="email" placeholder="<?php esc_attr_e( 'you@email.com', 'alp-astrology' ); ?>" required>
        </div>
      </div>
      <div class="field">
        <label for="cf-phone"><?php esc_html_e( 'Phone Number', 'alp-astrology' ); ?></label>
        <input type="tel" id="cf-phone" name="phone" placeholder="<?php esc_attr_e( '+91 ...', 'alp-astrology' ); ?>">
      </div>
      <div class="field">
        <label for="cf-message"><?php esc_html_e( 'Message', 'alp-astrology' ); ?></label>
        <textarea id="cf-message" name="message" placeholder="<?php esc_attr_e( 'How can we help you?', 'alp-astrology' ); ?>" required></textarea>
      </div>
      <button class="btn btn-primary btn-lg" id="cfSubmit" type="submit" style="width:100%;justify-content:center"><?php esc_html_e( 'Send Message', 'alp-astrology' ); ?></button>
      <div id="cfMsg" class="form-msg" role="alert" aria-live="polite"></div>
    </form>

  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="center reveal" style="margin-bottom:var(--sp-6)">
      <span class="eyebrow"><?php esc_html_e( 'Find Us', 'alp-astrology' ); ?></span>
      <h2 class="mt-3"><?php esc_html_e( 'Visit Our Office', 'alp-astrology' ); ?></h2>
    </div>
    <div style="border-radius:var(--r-lg);overflow:hidden;box-shadow:var(--shadow-md);height:400px">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.0!2d80.1676!3d13.0384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDAyJzE4LjIiTiA4MMKwMTAnMDMuNCJF!5e0!3m2!1sen!2sin!4v1000000000000" width="100%" height="400" style="border:0;display:block" allowfullscreen loading="lazy" title="<?php esc_attr_e( 'ALP Astrology Office Location', 'alp-astrology' ); ?>"></iframe>
    </div>
  </div>
</section>

<?php get_footer();
