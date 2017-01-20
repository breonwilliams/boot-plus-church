<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 12/4/16
 * Time: 8:40 AM
 */
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
    $labels = array(
        "name" => __( 'Staff', '' ),
        "singular_name" => __( 'Staff', '' ),
    );

    $args = array(
        "label" => __( 'Staff', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "staff", "with_front" => true ),
        "query_var" => true,

        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),					);
    register_post_type( "staff", $args );

    $labels = array(
        "name" => __( 'Sermons', '' ),
        "singular_name" => __( 'Sermon', '' ),
    );

    $args = array(
        "label" => __( 'Sermons', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "sermons", "with_front" => true ),
        "query_var" => true,

        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        "taxonomies" => array( "post_tag" ),
    );
    register_post_type( "sermons", $args );

    $labels = array(
        "name" => __( 'Ministries', '' ),
        "singular_name" => __( 'Ministry', '' ),
    );

    $args = array(
        "label" => __( 'Ministries', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "ministries", "with_front" => true ),
        "query_var" => true,

        "supports" => array( "title", "editor", "thumbnail", "excerpt", "page-attributes" ),					);
    register_post_type( "ministries", $args );

// End of cptui_register_my_cpts()
}
