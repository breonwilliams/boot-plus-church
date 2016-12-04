<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 12/2/16
 * Time: 3:09 PM
 */

function get_custom_post_type_template_staff($single_template) {
    global $post;

    if ($post->post_type == 'staff') {
        $single_template = dirname( __FILE__ ) .  '/plugin_template/single-staff.php';
    }
    return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template_staff' );

function get_custom_post_type_template_sermons($single_template) {
    global $post;

    if ($post->post_type == 'sermons') {
        $single_template = dirname( __FILE__ ) .  '/plugin_template/single-sermons.php';
    }
    return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template_sermons' );