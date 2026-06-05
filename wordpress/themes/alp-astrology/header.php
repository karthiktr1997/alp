<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="siteHeader">
  <div class="wrap">
    <nav class="nav" aria-label="<?php esc_attr_e( 'Primary', 'alp-astrology' ); ?>">

      <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'ALP Astrology home', 'alp-astrology' ); ?>">
        <img src="<?php echo esc_url( alp_logo_url() ); ?>" alt="<?php esc_attr_e( 'ALP Astrology', 'alp-astrology' ); ?>" width="64" height="64" fetchpriority="high" decoding="async">
      </a>

      <?php
      $current      = '';
      $queried_obj  = get_queried_object();
      if ( is_front_page() ) {
          $current = 'home';
      } elseif ( is_page() && $queried_obj ) {
          $current = $queried_obj->post_name;
      }
      $resources    = [ 'horoscope', 'articles', 'videos', 'events', 'testimonials', 'faq', 'success-stories' ];
      $in_resources = in_array( $current, $resources, true );
      ?>

      <ul class="nav-links" id="navLinks">
        <li>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $current === 'home' ? 'active' : ''; ?>">
            <?php esc_html_e( 'Home', 'alp-astrology' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="<?php echo $current === 'about' ? 'active' : ''; ?>">
            <?php esc_html_e( 'About', 'alp-astrology' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/courses' ) ); ?>" class="<?php echo $current === 'courses' ? 'active' : ''; ?>">
            <?php esc_html_e( 'Courses', 'alp-astrology' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/consultation' ) ); ?>" class="<?php echo $current === 'consultation' ? 'active' : ''; ?>">
            <?php esc_html_e( 'Consultation', 'alp-astrology' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="<?php echo $current === 'services' ? 'active' : ''; ?>">
            <?php esc_html_e( 'Services', 'alp-astrology' ); ?>
          </a>
        </li>
        <li class="has-sub">
          <button class="sub-toggle <?php echo $in_resources ? 'active' : ''; ?>" aria-expanded="false" aria-haspopup="true">
            <?php esc_html_e( 'Resources', 'alp-astrology' ); ?>
            <svg class="caret" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <ul class="sub-menu" role="menu">
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/horoscope' ) ); ?>" role="menuitem" class="<?php echo $current === 'horoscope' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Horoscope', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/articles' ) ); ?>" role="menuitem" class="<?php echo $current === 'articles' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Articles', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/videos' ) ); ?>" role="menuitem" class="<?php echo $current === 'videos' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Videos', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/events' ) ); ?>" role="menuitem" class="<?php echo $current === 'events' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Events', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/testimonials' ) ); ?>" role="menuitem" class="<?php echo $current === 'testimonials' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Testimonials', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/faq' ) ); ?>" role="menuitem" class="<?php echo $current === 'faq' ? 'active' : ''; ?>">
                <?php esc_html_e( 'FAQ', 'alp-astrology' ); ?>
              </a>
            </li>
            <li role="none">
              <a href="<?php echo esc_url( home_url( '/success-stories' ) ); ?>" role="menuitem" class="<?php echo $current === 'success-stories' ? 'active' : ''; ?>">
                <?php esc_html_e( 'Success Stories', 'alp-astrology' ); ?>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="<?php echo $current === 'contact' ? 'active' : ''; ?>">
            <?php esc_html_e( 'Contact', 'alp-astrology' ); ?>
          </a>
        </li>
      </ul>

      <a class="btn btn-red nav-cta desktop" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php esc_html_e( 'Talk to an Astrologer', 'alp-astrology' ); ?>
      </a>

      <button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'alp-astrology' ); ?>" aria-expanded="false" aria-controls="navLinks">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </button>

    </nav>
  </div>
</header>
