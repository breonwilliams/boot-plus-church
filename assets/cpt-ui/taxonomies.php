<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 12/4/16
 * Time: 8:40 AM
 */

add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {
    $labels = array(
        "name" => __( 'Roles', '' ),
        "singular_name" => __( 'Role', '' ),
    );

    $args = array(
        "label" => __( 'Roles', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Roles",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'role', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "role", array( "staff" ), $args );

    $labels = array(
        "name" => __( 'Sermon Categories', '' ),
        "singular_name" => __( 'Sermon Category', '' ),
    );

    $args = array(
        "label" => __( 'Sermon Categories', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Sermon Categories",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'sermon_category', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "sermon_category", array( "sermons" ), $args );

// End cptui_register_my_taxes()
}
