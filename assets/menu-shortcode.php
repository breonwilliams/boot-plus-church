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
            'label' => '',
        ), $atts, 'custom_div' );

    $class = $atts['class'];
    $label = $atts['label'];

    return '<nav id="cssmenu" class="'.$class.'"><div class="logo"><a href="index.html">'.$label.'</a></div><div id="head-mobile"></div><div class="button"></div>' . do_shortcode($content) . '</nav>';

}

add_shortcode('pushm_wrap', 'pushm_wrap');