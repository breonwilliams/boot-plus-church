<?php
/**
 * Custom functions
 */

register_nav_menus(array(
    'custom' => __('Custom Menu', 'bootstrap-basic'),
));

// Function that will return our WordPress menu
function list_menu($atts, $content = null) {
    extract(shortcode_atts(array(
        'menu'            => '',
        'container'       => '',
        'container_class' => '',
        'container_id'    => 'cssmenu',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => ''),
        $atts));

    return wp_nav_menu( array(
        'menu'            => $menu,
        'container'       => $container,
        'container_class' => $container_class,
        'container_id'    => $container_id,
        'menu_class'      => $menu_class,
        'menu_id'         => $menu_id,
        'echo'            => false,
        'fallback_cb'     => $fallback_cb,
        'before'          => $before,
        'after'           => $after,
        'link_before'     => $link_before,
        'link_after'      => $link_after,
        'depth'           => $depth,
        'walker'          => $walker,
        'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");

function pushm_wrap( $atts, $content = null ) {
    wp_enqueue_style( 'pmenu-style' );
    wp_enqueue_script( 'pmenu-main' );
    $atts = shortcode_atts(
        array(
            'class' => '',
        ), $atts, 'pushm_wrap' );

    $class = $atts['class'];

    $output .= '<nav id="cssmenu" class="'.$class.'">';
    if ( get_theme_mod( 'm3_logo' ) ) {
        $output .= '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">';
        $output .= '<img src="' . get_theme_mod( 'm3_logo' ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';
        $output .= '</a></div>';

    } else {
        $output .= '<div class="logo logo-text"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">';
        $output .= '' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '';
        $output .= '</a></div>';
    }
    $output .= '<div id="head-mobile"></div><div class="button"></div>' . do_shortcode($content) . '</nav>';

    return $output;

}

add_shortcode('pushm_wrap', 'pushm_wrap');