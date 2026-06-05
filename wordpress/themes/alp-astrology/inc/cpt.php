<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/* ── Register Custom Post Types ───────────────────────── */
add_action( 'init', 'alp_register_cpts' );
function alp_register_cpts() {

    /* alp_zodiac */
    register_post_type( 'alp_zodiac', [
        'labels' => [
            'name'               => __( 'Zodiac Signs', 'alp-astrology' ),
            'singular_name'      => __( 'Zodiac Sign', 'alp-astrology' ),
            'add_new_item'       => __( 'Add New Zodiac Sign', 'alp-astrology' ),
            'edit_item'          => __( 'Edit Zodiac Sign', 'alp-astrology' ),
            'view_item'          => __( 'View Zodiac Sign', 'alp-astrology' ),
            'search_items'       => __( 'Search Zodiac Signs', 'alp-astrology' ),
            'not_found'          => __( 'No zodiac signs found.', 'alp-astrology' ),
        ],
        'public'            => true,
        'has_archive'       => false,
        'rewrite'           => [ 'slug' => 'horoscope', 'with_front' => false ],
        'supports'          => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'      => true,
        'menu_icon'         => 'dashicons-star-filled',
        'menu_position'     => 20,
        'show_in_nav_menus' => true,
    ] );

    /* alp_testimonial */
    register_post_type( 'alp_testimonial', [
        'labels' => [
            'name'          => __( 'Testimonials', 'alp-astrology' ),
            'singular_name' => __( 'Testimonial', 'alp-astrology' ),
            'add_new_item'  => __( 'Add New Testimonial', 'alp-astrology' ),
            'edit_item'     => __( 'Edit Testimonial', 'alp-astrology' ),
        ],
        'public'            => false,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'supports'          => [ 'title', 'editor' ],
        'show_in_rest'      => true,
        'menu_icon'         => 'dashicons-format-quote',
        'menu_position'     => 21,
    ] );

    /* alp_event */
    register_post_type( 'alp_event', [
        'labels' => [
            'name'          => __( 'Events', 'alp-astrology' ),
            'singular_name' => __( 'Event', 'alp-astrology' ),
            'add_new_item'  => __( 'Add New Event', 'alp-astrology' ),
            'edit_item'     => __( 'Edit Event', 'alp-astrology' ),
        ],
        'public'            => true,
        'has_archive'       => true,
        'rewrite'           => [ 'slug' => 'events', 'with_front' => false ],
        'supports'          => [ 'title', 'editor', 'thumbnail' ],
        'show_in_rest'      => true,
        'menu_icon'         => 'dashicons-calendar',
        'menu_position'     => 22,
    ] );
}

/* ── Zodiac Meta Boxes ────────────────────────────────── */
add_action( 'add_meta_boxes', 'alp_zodiac_meta_boxes' );
function alp_zodiac_meta_boxes() {
    add_meta_box(
        'alp_zodiac_data',
        __( 'Zodiac Sign Data', 'alp-astrology' ),
        'alp_zodiac_meta_box_cb',
        'alp_zodiac',
        'normal',
        'high'
    );
}

function alp_zodiac_meta_box_cb( $post ) {
    wp_nonce_field( 'alp_zodiac_save', 'alp_zodiac_nonce' );
    $fields = [
        'alp_zodiac_glyph'        => 'Glyph (e.g. ♈︎)',
        'alp_zodiac_dates'        => 'Date Range (e.g. Mar 21–Apr 19)',
        'alp_zodiac_element'      => 'Element (Fire/Earth/Air/Water)',
        'alp_zodiac_planet'       => 'Ruling Planet',
        'alp_zodiac_quality'      => 'Quality (Cardinal/Fixed/Mutable)',
        'alp_zodiac_desc'         => 'Short Description',
        'alp_zodiac_strengths'    => 'Strengths (one per line)',
        'alp_zodiac_growth'       => 'Growth Areas (one per line)',
        'alp_zodiac_prev_sign'    => 'Previous Sign Slug',
        'alp_zodiac_next_sign'    => 'Next Sign Slug',
        'alp_zodiac_banner'       => 'Banner / data-banner slug',
    ];
    foreach ( $fields as $key => $label ) {
        $value = get_post_meta( $post->ID, $key, true );
        $tag   = in_array( $key, [ 'alp_zodiac_strengths', 'alp_zodiac_growth', 'alp_zodiac_desc' ], true ) ? 'textarea' : 'input';
        echo '<p><label for="' . esc_attr( $key ) . '"><strong>' . esc_html( $label ) . '</strong></label><br>';
        if ( $tag === 'textarea' ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="3" style="width:100%">' . esc_textarea( $value ) . '</textarea>';
        } else {
            echo '<input type="text" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" style="width:100%">';
        }
        echo '</p>';
    }
}

add_action( 'save_post_alp_zodiac', 'alp_zodiac_save_meta' );
function alp_zodiac_save_meta( $post_id ) {
    if ( ! isset( $_POST['alp_zodiac_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['alp_zodiac_nonce'], 'alp_zodiac_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [
        'alp_zodiac_glyph', 'alp_zodiac_dates', 'alp_zodiac_element',
        'alp_zodiac_planet', 'alp_zodiac_quality', 'alp_zodiac_desc',
        'alp_zodiac_strengths', 'alp_zodiac_growth',
        'alp_zodiac_prev_sign', 'alp_zodiac_next_sign', 'alp_zodiac_banner',
    ];
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, $field, sanitize_textarea_field( $_POST[ $field ] ) );
        }
    }
}

/* ── Helper: get zodiac data by slug ─────────────────── */
function alp_get_zodiac_data( $slug ) {
    $posts = get_posts( [
        'post_type'      => 'alp_zodiac',
        'name'           => $slug,
        'posts_per_page' => 1,
        'post_status'    => 'publish',
    ] );
    if ( empty( $posts ) ) return null;
    $post = $posts[0];
    $id   = $post->ID;
    return [
        'id'         => $id,
        'name'       => get_the_title( $id ),
        'slug'       => $post->post_name,
        'glyph'      => get_post_meta( $id, 'alp_zodiac_glyph', true ),
        'dates'      => get_post_meta( $id, 'alp_zodiac_dates', true ),
        'element'    => get_post_meta( $id, 'alp_zodiac_element', true ),
        'planet'     => get_post_meta( $id, 'alp_zodiac_planet', true ),
        'quality'    => get_post_meta( $id, 'alp_zodiac_quality', true ),
        'desc'       => get_post_meta( $id, 'alp_zodiac_desc', true ),
        'strengths'  => array_filter( array_map( 'trim', explode( "\n", get_post_meta( $id, 'alp_zodiac_strengths', true ) ) ) ),
        'growth'     => array_filter( array_map( 'trim', explode( "\n", get_post_meta( $id, 'alp_zodiac_growth', true ) ) ) ),
        'prev_sign'  => get_post_meta( $id, 'alp_zodiac_prev_sign', true ),
        'next_sign'  => get_post_meta( $id, 'alp_zodiac_next_sign', true ),
        'banner'     => get_post_meta( $id, 'alp_zodiac_banner', true ),
        'permalink'  => get_permalink( $id ),
    ];
}
