<?php
/*
 * Template Name: Elementor Full Width
 * Template Post Type: page
 */
get_header();
while ( have_posts() ) : the_post();
    the_content();
endwhile;
get_footer();
