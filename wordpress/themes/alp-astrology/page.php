<?php get_header(); ?>

<?php
$post_title = get_the_title();
$post_slug  = get_post_field( 'post_name', get_queried_object_id() );
?>

<section class="page-hero" aria-label="<?php echo esc_attr( $post_title ); ?>">
  <div class="wrap" style="position:relative;z-index:2;">
    <span class="eyebrow"><?php esc_html_e( 'ALP Astrology', 'alp-astrology' ); ?></span>
    <h1 class="mt-4"><?php the_title(); ?></h1>
    <?php if ( has_excerpt() ) : ?>
      <p class="lead mt-5"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
    <?php endif; ?>
    <nav class="crumbs mt-4" aria-label="<?php esc_attr_e( 'Breadcrumb', 'alp-astrology' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'alp-astrology' ); ?></a>
      &rsaquo;
      <span><?php the_title(); ?></span>
    </nav>
  </div>
</section>

<main class="section-pad" id="main-content">
  <div class="wrap">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
