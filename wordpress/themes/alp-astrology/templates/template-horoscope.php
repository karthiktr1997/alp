<?php
/*
 * Template Name: Horoscope
 */
if ( ! defined( 'ABSPATH' ) ) exit;
add_filter( 'alp_body_data', function () { return 'data-page="horoscope"'; } );
get_header();

$signs = [
    [ 'slug' => 'aries',       'name' => 'Aries',       'glyph' => '♈︎', 'dates' => 'Mar 21 – Apr 19', 'element' => 'Fire'  ],
    [ 'slug' => 'taurus',      'name' => 'Taurus',      'glyph' => '♉︎', 'dates' => 'Apr 20 – May 20', 'element' => 'Earth' ],
    [ 'slug' => 'gemini',      'name' => 'Gemini',      'glyph' => '♊︎', 'dates' => 'May 21 – Jun 20', 'element' => 'Air'   ],
    [ 'slug' => 'cancer',      'name' => 'Cancer',      'glyph' => '♋︎', 'dates' => 'Jun 21 – Jul 22', 'element' => 'Water' ],
    [ 'slug' => 'leo',         'name' => 'Leo',         'glyph' => '♌︎', 'dates' => 'Jul 23 – Aug 22', 'element' => 'Fire'  ],
    [ 'slug' => 'virgo',       'name' => 'Virgo',       'glyph' => '♍︎', 'dates' => 'Aug 23 – Sep 22', 'element' => 'Earth' ],
    [ 'slug' => 'libra',       'name' => 'Libra',       'glyph' => '♎︎', 'dates' => 'Sep 23 – Oct 22', 'element' => 'Air'   ],
    [ 'slug' => 'scorpio',     'name' => 'Scorpio',     'glyph' => '♏︎', 'dates' => 'Oct 23 – Nov 21', 'element' => 'Water' ],
    [ 'slug' => 'sagittarius', 'name' => 'Sagittarius', 'glyph' => '♐︎', 'dates' => 'Nov 22 – Dec 21', 'element' => 'Fire'  ],
    [ 'slug' => 'capricorn',   'name' => 'Capricorn',   'glyph' => '♑︎', 'dates' => 'Dec 22 – Jan 19', 'element' => 'Earth' ],
    [ 'slug' => 'aquarius',    'name' => 'Aquarius',    'glyph' => '♒︎', 'dates' => 'Jan 20 – Feb 18', 'element' => 'Air'   ],
    [ 'slug' => 'pisces',      'name' => 'Pisces',      'glyph' => '♓︎', 'dates' => 'Feb 19 – Mar 20', 'element' => 'Water' ],
];
?>

<section class="page-hero">
  <div class="wrap">
    <span class="eyebrow"><?php esc_html_e( 'Horoscope', 'alp-astrology' ); ?></span>
    <h1 class="mt-3"><?php esc_html_e( 'Explore the 12 Zodiac Signs', 'alp-astrology' ); ?></h1>
    <p class="lead mt-4"><?php esc_html_e( 'Discover the traits, elements and cosmic qualities of each zodiac sign through the lens of Vedic astrology.', 'alp-astrology' ); ?></p>
    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a> &nbsp;/&nbsp; <?php esc_html_e( 'Horoscope', 'alp-astrology' ); ?></div>
  </div>
</section>

<section class="section-pad">
  <div class="wrap">
    <div class="z-grid">
      <?php foreach ( $signs as $sign ) :
        $data   = function_exists( 'alp_get_zodiac_data' ) ? alp_get_zodiac_data( $sign['slug'] ) : null;
        $url    = $data ? esc_url( $data['permalink'] ) : esc_url( home_url( '/horoscope/' . $sign['slug'] ) );
        $glyph  = $data ? esc_html( $data['glyph'] ) : esc_html( $sign['glyph'] );
        $planet = $data ? esc_html( $data['planet'] ) : '';
      ?>
      <a href="<?php echo $url; ?>" class="z-card reveal">
        <div class="z-g"><?php echo $glyph; ?></div>
        <b><?php echo esc_html( $sign['name'] ); ?></b>
        <span class="z-d"><?php echo esc_html( $sign['dates'] ); ?></span>
        <span class="z-p"><?php echo esc_html( $sign['element'] ); ?><?php echo $planet ? ' &middot; ' . $planet : ''; ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--bg-cream)">
  <div class="wrap">
    <div class="cta-band reveal">
      <div style="position:relative;z-index:1">
        <h2><?php esc_html_e( 'Want a personalised reading?', 'alp-astrology' ); ?></h2>
        <p class="lead mt-3"><?php esc_html_e( 'Your sun sign is just the beginning. Book a full birth chart consultation to uncover the deeper story of your stars.', 'alp-astrology' ); ?></p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:32px">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/consultation' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'alp-astrology' ); ?></a>
          <a class="btn btn-ghost-light btn-lg" href="https://wa.me/919786556156" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chat on WhatsApp', 'alp-astrology' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
