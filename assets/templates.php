<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 12/2/16
 * Time: 3:09 PM
 */

add_filter( 'template_include', 'insert_sermons_template' );

function insert_sermons_template( $template )
{
    if ( 'sermons' === get_post_type() )
        return dirname( __FILE__ ) . '/plugin_template/single-sermons.php';

    return $template;
}

add_filter( 'template_include', 'insert_staff_template' );

function insert_staff_template( $template )
{
    if ( 'staff' === get_post_type() )
        return dirname( __FILE__ ) . '/plugin_template/single-staff.php';

    return $template;
}