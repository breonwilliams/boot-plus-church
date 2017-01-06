<?php
/**
 * Custom functions
 */

/*staff thumbnail start*/
if ( ! function_exists('staff_posts') ) {
    function staff_posts( $atts ){
        wp_enqueue_style( 'masonry-css' );
        wp_enqueue_script( 'imagesLoaded-js' );
        wp_enqueue_script( 'masonry-min' );
        wp_enqueue_script( 'masonry-init' );

        $atts = shortcode_atts( array(
            'ptype' => '',
            'per_page'  =>      2,
            'order'     =>  'DESC',
            'orderby'   =>  'date',
            'category' => '',
            'class' => '',
            'column' => '',
            'pagination' => '',
        ), $atts );

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $class = $atts['class'];
        $column = $atts['column'];
        $pagination = $atts['pagination'];

        $args = array(
            'post_type'    =>  $atts["ptype"],
            'posts_per_page'    =>  $atts["per_page"],
            'order'             =>  $atts["order"],
            'orderby'           =>  $atts["orderby"],
            'paged'             =>  $paged,
            'category_name' => $category
        );

        $query = new WP_Query($args);

        $output .= '<div class="row mgrid '.$class.'">';

        if($query->have_posts()) : $output;

            while ($query->have_posts()) : $query->the_post();

                $output .= '<div id="post-' . get_the_ID() . '" class="mgrid-item '.$column.' ' . implode(' ', get_post_class()) . '">';

                $output .= '<div class="thumbnail">';



                if ( has_post_thumbnail() ) {

                    $output .= '<a href="' . get_permalink() . '" title="' . the_title('','',false) . '">';
                    $output .= get_the_post_thumbnail( get_the_id(), 'post_thumbnail_square', array('class' => 'img-responsive aligncenter'));
                    $output .= '</a>';

                } else {


                }

                $output .= '<div class="caption">';

                $output .= '<h3 class="post-title st-full-name"><span><a href="' . get_permalink() . '" title="' . the_title('','',false) . '">' . the_title('','',false) . '</a></span></h3>';

                if ( get_field('staff_title' )) {
                    $output .= '<p class="st-title"><strong>';
                    $output .= '' . get_field('staff_title') . '';
                    $output .= '</strong></p>';

                } else {
                }

                if ( get_field('email' )) {
                    $output .= '<p class="st-email"><a href="mailto:' . get_field('email') . '" class="staff_email">';
                    $output .= '<i class="fa fa-envelope" aria-hidden="true"></i> Email ';
                    $output .= '</a></p>';

                } else {
                }

                if ( get_field('phone_number' )) {
                    $output .= '<p class="st-phone"><i class="fa fa-phone" aria-hidden="true"></i> ';
                    $output .= '' . get_field('phone_number') . '';
                    $output .= '</p>';

                } else {
                }

                $output .= '</div>';
                $output .= '<div class="clearfix"></div>';



                $output .= '</div>';
                $output .= '</div>';

            endwhile;global $wp_query;
            $output .= '</div>';

            $args_pagi = array(
                'base' => add_query_arg( 'paged', '%#%' ),
                'total' => $query->max_num_pages,
                'current' => $paged
            );
            $output .= '<div class="clearfix"></div>';

            $output .= '<div class="post-nav col-md-12 ' . $pagination . '">';
            $output .= paginate_links( $args_pagi);

            //    $output .= '<div class="next-page">' . get_next_posts_link( "Older Entries »", 3 ) . '</div>';

            $output .= '</div>';

        else:

            $output .= '<p>Sorry, there are no posts to display</p>';

        endif;
        wp_reset_postdata();

        return $output;
    }
}

add_shortcode('staff_posts', 'staff_posts');

/*staff thumbnail end*/

/*staff table start*/
add_shortcode( 'staff_tables', 'staff_tables' );
function staff_tables( $atts ) {

    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => 4,
        'category' => '',
        'ptype' => 'staff',
        'role' => '',
        'order'     =>  '',
        'orderby'   =>  '',
    ), $atts ) );


    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'role' => $role,
        'order' =>  $order,
        'orderby' =>  $orderby,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <ul class=" respList-wrap">


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>


                <li id="post-<?php the_ID(); ?>" <?php post_class('resplist-item'); ?>>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="st-full-name">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                                <div class="col-sm-6">
                                    <?php if( get_field('staff_title') ): ?>
                                        <p class="st-title"><strong><?php the_field('staff_title'); ?></strong></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <?php if( get_field('email') ): ?>
                                        <p class="st-email"><a href="mailto:<?php the_field('email'); ?>" class="staff_email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8 col-sm-6">
                                    <?php if( get_field('phone_number') ): ?>
                                        <p class="st-phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('phone_number'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            <?php endwhile;
            wp_reset_postdata(); ?>


        </ul>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

/*staff table end*/
