<?php get_header(); ?>

<!-- ══════════════════════════════════════════════
     SECTION 1: HERO
══════════════════════════════════════════════ -->
<section class="hero" aria-label="<?php esc_attr_e( 'Hero', 'alp-astrology' ); ?>">
  <div class="wrap">
    <div class="hero-grid">

      <div class="hero-copy reveal">
        <span class="eyebrow"><?php esc_html_e( 'Vedic Astrology &bull; Since 2009', 'alp-astrology' ); ?></span>

        <h1 class="mt-4">
          <?php esc_html_e( 'Unlock the Secrets of Your ', 'alp-astrology' ); ?>
          <em><?php esc_html_e( 'Destiny', 'alp-astrology' ); ?></em>
          <?php esc_html_e( ' with ALP Astrology', 'alp-astrology' ); ?>
        </h1>

        <p class="lead mt-5">
          <?php esc_html_e( 'Expert Vedic astrology guidance for career, relationships, health, and spiritual growth. Trusted by 500+ clients across India and worldwide.', 'alp-astrology' ); ?>
        </p>

        <div class="hero-cta">
          <a href="<?php echo esc_url( home_url( '/consultation' ) ); ?>" class="btn btn-primary btn-lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            <?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/courses' ) ); ?>" class="btn btn-ghost-light btn-lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            <?php esc_html_e( 'Join Our Courses', 'alp-astrology' ); ?>
          </a>
        </div>

        <div class="hero-trust">
          <div>
            <b>500+</b>
            <span><?php esc_html_e( 'Happy Clients', 'alp-astrology' ); ?></span>
          </div>
          <div>
            <b>15+</b>
            <span><?php esc_html_e( 'Years Experience', 'alp-astrology' ); ?></span>
          </div>
          <div>
            <b>250+</b>
            <span><?php esc_html_e( 'Google Reviews', 'alp-astrology' ); ?></span>
          </div>
        </div>
      </div><!-- .hero-copy -->

      <div class="hero-spacer" aria-hidden="true"></div>

    </div><!-- .hero-grid -->
  </div><!-- .wrap -->
</section>


<!-- ══════════════════════════════════════════════
     GLYPH DIVIDER
══════════════════════════════════════════════ -->
<div class="wrap">
  <div class="glyph-divider" aria-hidden="true">✦ ✧ ✦ ✧ ✦ ✧</div>
</div>


<!-- ══════════════════════════════════════════════
     SECTION 2: WHO WE ARE
══════════════════════════════════════════════ -->
<section class="section-pad" aria-labelledby="who-heading">
  <div class="wrap">
    <div class="two-col">

      <!-- Image with floating badge -->
      <div class="media whoimg reveal" style="min-height:460px;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/alp-founder.jpg' ); ?>"
             alt="<?php esc_attr_e( 'ALP Astrology Founder', 'alp-astrology' ); ?>"
             width="600" height="460" loading="lazy" decoding="async">
        <div class="badge-float">
          <div class="bf-i" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
          <div>
            <b>15+ <?php esc_html_e( 'Years', 'alp-astrology' ); ?></b>
            <span><?php esc_html_e( 'Vedic Expertise', 'alp-astrology' ); ?></span>
          </div>
        </div>
      </div>

      <!-- Text -->
      <div class="reveal">
        <span class="eyebrow"><?php esc_html_e( 'Who We Are', 'alp-astrology' ); ?></span>
        <h2 id="who-heading" class="mt-4">
          <?php esc_html_e( 'Ancient Wisdom, ', 'alp-astrology' ); ?>
          <span class="text-grad"><?php esc_html_e( 'Modern Guidance', 'alp-astrology' ); ?></span>
        </h2>
        <p class="lead mt-5">
          <?php esc_html_e( 'ALP Astrology was founded with a single mission: to make authentic Vedic astrology accessible to everyone seeking clarity, direction, and purpose.', 'alp-astrology' ); ?>
        </p>
        <p class="mt-4" style="color:var(--fg2);">
          <?php esc_html_e( 'Our founder brings over 15 years of deep expertise in Jyotisha, Nadi Astrology, KP System, and Numerology. Based in Chennai, we have guided hundreds of families across India and abroad through life\'s most important decisions.', 'alp-astrology' ); ?>
        </p>
        <ul class="feat-list mt-5">
          <li><?php esc_html_e( 'Personalised one-on-one consultations', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Comprehensive natal chart analysis', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Structured courses for all levels', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Remedial astrology & gemstone guidance', 'alp-astrology' ); ?></li>
        </ul>
        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-outline mt-6">
          <?php esc_html_e( 'Learn More About Us', 'alp-astrology' ); ?>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 3: COURSES
══════════════════════════════════════════════ -->
<section class="section-pad section-bg-cream" aria-labelledby="courses-heading">
  <div class="wrap">
    <div class="two-col media-after">

      <!-- Text -->
      <div class="reveal">
        <span class="eyebrow"><?php esc_html_e( 'Learn Astrology', 'alp-astrology' ); ?></span>
        <h2 id="courses-heading" class="mt-4">
          <?php esc_html_e( 'Master Vedic Astrology ', 'alp-astrology' ); ?>
          <span class="text-grad"><?php esc_html_e( 'from Experts', 'alp-astrology' ); ?></span>
        </h2>
        <p class="lead mt-5">
          <?php esc_html_e( 'From beginner foundations to advanced predictive techniques, our courses are designed for serious students of Vedic Jyotisha.', 'alp-astrology' ); ?>
        </p>
        <ul class="feat-list mt-5">
          <li><?php esc_html_e( 'Beginner to Advanced structured curriculum', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Live online classes + recorded sessions', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'KP System, Nadi Astrology & Numerology modules', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Certificate awarded on completion', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Lifetime community access & mentorship', 'alp-astrology' ); ?></li>
        </ul>
        <a href="<?php echo esc_url( home_url( '/courses' ) ); ?>" class="btn btn-primary mt-6">
          <?php esc_html_e( 'Explore All Courses', 'alp-astrology' ); ?>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>

      <!-- Image -->
      <div class="media reveal" style="min-height:420px;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/courses-feature.jpg' ); ?>"
             alt="<?php esc_attr_e( 'ALP Astrology Courses', 'alp-astrology' ); ?>"
             width="600" height="420" loading="lazy" decoding="async">
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 4: CONSULTATION
══════════════════════════════════════════════ -->
<section class="section-pad" aria-labelledby="consult-heading">
  <div class="wrap">
    <div class="two-col">

      <!-- Image -->
      <div class="media reveal" style="min-height:420px;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/consultation-feature.jpg' ); ?>"
             alt="<?php esc_attr_e( 'Astrology Consultation', 'alp-astrology' ); ?>"
             width="600" height="420" loading="lazy" decoding="async">
      </div>

      <!-- Text -->
      <div class="reveal">
        <span class="eyebrow"><?php esc_html_e( 'Personal Consultation', 'alp-astrology' ); ?></span>
        <h2 id="consult-heading" class="mt-4">
          <?php esc_html_e( 'Get Clarity on ', 'alp-astrology' ); ?>
          <span class="text-grad"><?php esc_html_e( 'Life\'s Big Questions', 'alp-astrology' ); ?></span>
        </h2>
        <p class="lead mt-5">
          <?php esc_html_e( 'Our personalised consultations give you deep insights into your birth chart and actionable guidance for the challenges you face right now.', 'alp-astrology' ); ?>
        </p>
        <ul class="feat-list mt-5">
          <li><?php esc_html_e( 'Career, business & finance readings', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Marriage compatibility & relationship guidance', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Health & wellbeing analysis', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Muhurtha (auspicious timing) selection', 'alp-astrology' ); ?></li>
          <li><?php esc_html_e( 'Child birth, naming & education guidance', 'alp-astrology' ); ?></li>
        </ul>
        <div style="display:flex;gap:var(--sp-3);flex-wrap:wrap;" class="mt-6">
          <a href="<?php echo esc_url( home_url( '/consultation' ) ); ?>" class="btn btn-red">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            <?php esc_html_e( 'Book Now', 'alp-astrology' ); ?>
          </a>
          <a href="https://wa.me/919786556156" class="btn btn-outline" target="_blank" rel="noopener noreferrer">
            <?php esc_html_e( 'WhatsApp Us', 'alp-astrology' ); ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 5: SERVICES CARDS
══════════════════════════════════════════════ -->
<section class="section-pad section-bg-cream" aria-labelledby="services-heading">
  <div class="wrap">
    <div class="center reveal">
      <span class="eyebrow"><?php esc_html_e( 'What We Offer', 'alp-astrology' ); ?></span>
      <h2 id="services-heading" class="mt-4"><?php esc_html_e( 'Our Services', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4" style="max-width:54ch;margin-inline:auto;">
        <?php esc_html_e( 'Comprehensive Vedic astrology services tailored to guide every aspect of your life journey.', 'alp-astrology' ); ?>
      </p>
    </div>

    <div class="card-grid c4 mt-6">

      <article class="s-card reveal">
        <div class="s-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3><?php esc_html_e( 'Consultation', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'One-on-one personalised readings covering career, relationships, health, and all major life areas.', 'alp-astrology' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/consultation' ) ); ?>" class="btn btn-outline mt-5" style="font-size:.88rem;padding:.65em 1.2em;">
          <?php esc_html_e( 'Learn More', 'alp-astrology' ); ?>
        </a>
      </article>

      <article class="s-card reveal">
        <div class="s-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        </div>
        <h3><?php esc_html_e( 'Courses', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Structured Vedic astrology courses from foundations to advanced predictive techniques and KP system.', 'alp-astrology' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/courses' ) ); ?>" class="btn btn-outline mt-5" style="font-size:.88rem;padding:.65em 1.2em;">
          <?php esc_html_e( 'Learn More', 'alp-astrology' ); ?>
        </a>
      </article>

      <article class="s-card reveal">
        <div class="s-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3><?php esc_html_e( 'Astrology Software', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Professional Vedic astrology software for chart generation, transit analysis, and predictive calculations.', 'alp-astrology' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn-outline mt-5" style="font-size:.88rem;padding:.65em 1.2em;">
          <?php esc_html_e( 'Learn More', 'alp-astrology' ); ?>
        </a>
      </article>

      <article class="s-card reveal">
        <div class="s-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        </div>
        <h3><?php esc_html_e( 'Books & Resources', 'alp-astrology' ); ?></h3>
        <p><?php esc_html_e( 'Curated astrology books, reference guides, and digital resources for students and practitioners.', 'alp-astrology' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn-outline mt-5" style="font-size:.88rem;padding:.65em 1.2em;">
          <?php esc_html_e( 'Learn More', 'alp-astrology' ); ?>
        </a>
      </article>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 6: STATS
══════════════════════════════════════════════ -->
<section class="stats-dark" aria-label="<?php esc_attr_e( 'Our achievements', 'alp-astrology' ); ?>">
  <div class="wrap">
    <div class="stat-row">
      <div class="stat reveal">
        <b data-count="500">0</b>
        <span><?php esc_html_e( 'Clients Served', 'alp-astrology' ); ?></span>
      </div>
      <div class="stat reveal">
        <b data-count="250">0</b>
        <span><?php esc_html_e( 'Google Reviews', 'alp-astrology' ); ?></span>
      </div>
      <div class="stat reveal">
        <b data-count="15">0</b>
        <span><?php esc_html_e( 'Years Experience', 'alp-astrology' ); ?></span>
      </div>
      <div class="stat reveal">
        <b data-count="20">0</b>
        <span><?php esc_html_e( 'Services Offered', 'alp-astrology' ); ?></span>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 7: TESTIMONIAL
══════════════════════════════════════════════ -->
<section class="section-pad testimonial" aria-labelledby="testimonial-heading">
  <div class="wrap">
    <div class="center reveal">
      <span class="eyebrow"><?php esc_html_e( 'What Our Clients Say', 'alp-astrology' ); ?></span>
      <h2 id="testimonial-heading" class="sr-only"><?php esc_html_e( 'Testimonials', 'alp-astrology' ); ?></h2>
    </div>
    <div class="quote-card reveal mt-5">
      <div class="qmark" aria-hidden="true">&ldquo;</div>
      <blockquote>
        <?php esc_html_e( 'The consultation with ALP Astrology was life-changing. The accuracy of the reading was astounding and the guidance I received helped me make one of the most important decisions of my career. I highly recommend this to anyone seeking genuine Vedic astrology guidance.', 'alp-astrology' ); ?>
      </blockquote>
      <div class="quote-person">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/testimonial-avatar.jpg' ); ?>"
             alt="<?php esc_attr_e( 'Client testimonial', 'alp-astrology' ); ?>"
             width="58" height="58" loading="lazy" decoding="async">
        <div>
          <b><?php esc_html_e( 'Priya Ramachandran', 'alp-astrology' ); ?></b>
          <span><?php esc_html_e( 'Chennai &bull; Google Review ★★★★★', 'alp-astrology' ); ?></span>
        </div>
      </div>
      <div class="mt-5">
        <a href="<?php echo esc_url( home_url( '/testimonials' ) ); ?>" class="btn btn-outline">
          <?php esc_html_e( 'Read All Reviews', 'alp-astrology' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     SECTION 8: CONTACT
══════════════════════════════════════════════ -->
<section class="section-pad" id="contact" aria-labelledby="contact-heading">
  <div class="wrap">

    <div class="center reveal">
      <span class="eyebrow"><?php esc_html_e( 'Get In Touch', 'alp-astrology' ); ?></span>
      <h2 id="contact-heading" class="mt-4"><?php esc_html_e( 'Start Your Astrology Journey', 'alp-astrology' ); ?></h2>
      <p class="lead mt-4" style="max-width:52ch;margin-inline:auto;">
        <?php esc_html_e( 'Reach out for a consultation, course enquiry, or any questions. We\'re here to guide you.', 'alp-astrology' ); ?>
      </p>
    </div>

    <div class="contact-grid mt-6">

      <!-- Contact info -->
      <div class="contact-info reveal">

        <div class="ci-item">
          <div class="ci-i" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <h4><?php esc_html_e( 'Phone & WhatsApp', 'alp-astrology' ); ?></h4>
            <p><a href="tel:+919786556156">+91 9786556156</a></p>
            <p><a href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chat on WhatsApp', 'alp-astrology' ); ?></a></p>
          </div>
        </div>

        <div class="ci-item">
          <div class="ci-i" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <h4><?php esc_html_e( 'Email', 'alp-astrology' ); ?></h4>
            <p><a href="mailto:alpastrology@gmail.com">alpastrology@gmail.com</a></p>
            <p><a href="mailto:alpastrologyoffice@gmail.com">alpastrologyoffice@gmail.com</a></p>
          </div>
        </div>

        <div class="ci-item">
          <div class="ci-i" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <h4><?php esc_html_e( 'Office Address', 'alp-astrology' ); ?></h4>
            <p>F2, 1st Floor, Shiva Homes,<br>Moulivakkam, Chennai 600116</p>
          </div>
        </div>

        <div class="ci-item">
          <div class="ci-i" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <h4><?php esc_html_e( 'Consultation Hours', 'alp-astrology' ); ?></h4>
            <p><?php esc_html_e( 'Mon – Sat: 9:00 AM – 7:00 PM', 'alp-astrology' ); ?></p>
            <p><?php esc_html_e( 'Sunday: By appointment only', 'alp-astrology' ); ?></p>
          </div>
        </div>

      </div><!-- .contact-info -->

      <!-- Contact form -->
      <div class="contact-form reveal">
        <h3 class="mt-0" style="margin-bottom:var(--sp-5);"><?php esc_html_e( 'Send Us a Message', 'alp-astrology' ); ?></h3>
        <form id="alpContactForm" novalidate>
          <div class="form-row">
            <div class="field">
              <label for="cf-name"><?php esc_html_e( 'Full Name *', 'alp-astrology' ); ?></label>
              <input type="text" id="cf-name" name="name" placeholder="<?php esc_attr_e( 'Your full name', 'alp-astrology' ); ?>" required>
            </div>
            <div class="field">
              <label for="cf-email"><?php esc_html_e( 'Email Address *', 'alp-astrology' ); ?></label>
              <input type="email" id="cf-email" name="email" placeholder="<?php esc_attr_e( 'your@email.com', 'alp-astrology' ); ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="field">
              <label for="cf-phone"><?php esc_html_e( 'Phone Number', 'alp-astrology' ); ?></label>
              <input type="tel" id="cf-phone" name="phone" placeholder="<?php esc_attr_e( '+91 XXXXX XXXXX', 'alp-astrology' ); ?>">
            </div>
            <div class="field">
              <label for="cf-service"><?php esc_html_e( 'Service Interested In', 'alp-astrology' ); ?></label>
              <select id="cf-service" name="service">
                <option value=""><?php esc_html_e( 'Select a service', 'alp-astrology' ); ?></option>
                <option value="consultation"><?php esc_html_e( 'Personal Consultation', 'alp-astrology' ); ?></option>
                <option value="courses"><?php esc_html_e( 'Astrology Courses', 'alp-astrology' ); ?></option>
                <option value="horoscope"><?php esc_html_e( 'Horoscope Reading', 'alp-astrology' ); ?></option>
                <option value="marriage"><?php esc_html_e( 'Marriage Compatibility', 'alp-astrology' ); ?></option>
                <option value="numerology"><?php esc_html_e( 'Numerology', 'alp-astrology' ); ?></option>
                <option value="other"><?php esc_html_e( 'Other', 'alp-astrology' ); ?></option>
              </select>
            </div>
          </div>
          <div class="field">
            <label for="cf-message"><?php esc_html_e( 'Message *', 'alp-astrology' ); ?></label>
            <textarea id="cf-message" name="message" placeholder="<?php esc_attr_e( 'Tell us about your query or the guidance you are seeking...', 'alp-astrology' ); ?>" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-lg" id="cfSubmit">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <?php esc_html_e( 'Send Message', 'alp-astrology' ); ?>
          </button>
          <div id="cfMsg" class="form-msg" role="alert" aria-live="polite"></div>
        </form>
      </div><!-- .contact-form -->

    </div><!-- .contact-grid -->
  </div><!-- .wrap -->
</section>

<?php get_footer(); ?>
