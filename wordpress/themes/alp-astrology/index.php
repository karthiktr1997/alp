<?php get_header(); ?>

<section class="page-hero">
  <div class="wrap" style="position:relative;z-index:2;">
    <span class="eyebrow"><?php esc_html_e( 'ALP Astrology', 'alp-astrology' ); ?></span>
    <?php if ( is_home() && ! is_front_page() ) : ?>
      <h1 class="mt-4"><?php esc_html_e( 'Blog & Articles', 'alp-astrology' ); ?></h1>
    <?php elseif ( is_search() ) : ?>
      <h1 class="mt-4">
        <?php
        /* translators: %s: search query */
        printf( esc_html__( 'Search Results for: %s', 'alp-astrology' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
        ?>
      </h1>
    <?php elseif ( is_archive() ) : ?>
      <h1 class="mt-4"><?php the_archive_title(); ?></h1>
      <?php the_archive_description( '<p class="lead mt-4">', '</p>' ); ?>
    <?php else : ?>
      <h1 class="mt-4"><?php esc_html_e( 'Latest Posts', 'alp-astrology' ); ?></h1>
    <?php endif; ?>
  </div>
</section>

<main class="section-pad" id="main-content">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <div class="card-grid c3">
        <?php while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 's-card' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="media" style="margin-bottom:var(--sp-5);min-height:200px;">
                <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                  <?php the_post_thumbnail( 'alp-card', [ 'loading' => 'lazy' ] ); ?>
                </a>
              </div>
            <?php endif; ?>
            <div class="s-card-meta" style="display:flex;gap:.6em;align-items:center;margin-bottom:var(--sp-3);">
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" style="font-size:.82rem;color:var(--fg3);">
                <?php echo esc_html( get_the_date() ); ?>
              </time>
            </div>
            <h3 style="font-size:1.15rem;margin-bottom:.5em;">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p style="color:var(--fg2);font-size:.95rem;"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-5" style="font-size:.88rem;padding:.65em 1.2em;">
              <?php esc_html_e( 'Read More', 'alp-astrology' ); ?>
            </a>
          </article>
        <?php endwhile; ?>
      </div><!-- .card-grid -->

      <div class="mt-7" style="display:flex;justify-content:center;">
        <?php the_posts_pagination( [
            'mid_size'  => 2,
            'prev_text' => '&larr; ' . esc_html__( 'Previous', 'alp-astrology' ),
            'next_text' => esc_html__( 'Next', 'alp-astrology' ) . ' &rarr;',
        ] ); ?>
      </div>

    <?php else : ?>

      <div class="center" style="padding:var(--sp-9) 0;">
        <div style="font-size:3rem;" aria-hidden="true">✦</div>
        <h2 class="mt-4"><?php esc_html_e( 'Nothing Found', 'alp-astrology' ); ?></h2>
        <p class="lead mt-4">
          <?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Try a search below or browse our services.', 'alp-astrology' ); ?>
        </p>
        <?php get_search_form(); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary mt-5">
          <?php esc_html_e( 'Back to Home', 'alp-astrology' ); ?>
        </a>
      </div>

    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
