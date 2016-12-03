<?php
/**
 * Custom functions
 */


/*recent posts list start*/
add_shortcode( 'list_recent_posts', 'list_recent_posts' );
function list_recent_posts( $atts ) {
    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => 4,
        'category' => '',
        'ptype' => '',
        'class' => '',
    ), $atts ) );

    $class = $atts['class'];

    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

<ul class="media recent-posts <?php echo $class; ?>">

<?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <li class="media-listitem">

<?php
  if(has_post_thumbnail()):
    ?><a class="pull-left" href="<?php the_permalink(); ?>">
    <div class="thumbnail">
      <?php
        if ( has_post_thumbnail() ) {
        the_post_thumbnail('post_thumbnail');
        }
      ?> 
    </div>
  </a>

<?php else: ?>

<?php endif; ?>


<?php
  if(has_post_thumbnail()): ?>
    <div class="media-content marginlft-90">
<?php else: ?>
    <div class="media-content">
<?php endif; ?>


                        <div class="caption">
                            <h4 class="media-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
                            
                            <p><?php the_excerpt(); ?></p>

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

/*recent posts list end*/



/*recent posts carousel start*/












if ( ! function_exists('carousel_recent_posts') ) {
        function carousel_recent_posts( $atts ){
        wp_enqueue_script( 'slick-js' );
        wp_enqueue_script( 'slick-init' );

            $atts = shortcode_atts( array(
                            'ptype' => '',
                            'per_page'  =>      2,
                            'order'     =>  'DESC',
                            'orderby'   =>  'date',
                            'category' => '',
                            'class' => '',
                            'column' => '',
                    ), $atts );

            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            $class = $atts['class'];
            $column = $atts['column'];

            $args = array(
                'post_type'    =>  $atts["ptype"],
                'posts_per_page'    =>  $atts["per_page"],
                'order'             =>  $atts["order"],
                'orderby'           =>  $atts["orderby"],
                'paged'             =>  $paged,
                'category_name' => $category
            );

            $query = new WP_Query($args);

                                            $output .= '<div class="row '.$class.'">';

                    if($query->have_posts()) : $output;

                        while ($query->have_posts()) : $query->the_post();

                            $output .= '<div id="post-' . get_the_ID() . '" class="'.$column.' ' . implode(' ', get_post_class()) . '">';

                                        $output .= '<div class="thumbnail">';

                                        $output .= '<a href="' . get_permalink() . '" title="' . the_title('','',false) . '">';

                                            if ( has_post_thumbnail() ) {

                                                $output .= get_the_post_thumbnail( get_the_id(), 'post_thumbnail_lg', array('class' => 'img-responsive aligncenter'));

                                            } else {


                                            }

                                        $output .= '</a>';
                                        $output .= '<div class="caption caption-fixedh">';

                                $output .= '<h3 class="post-title"><span><a href="' . get_permalink() . '" title="' . the_title('','',false) . '">' . the_title('','',false) . '</a></span></h3>';

                                        $output .= get_the_excerpt();

                                        $output .= '<div class="clearfix"></div>';
                                        $output .= '</div>';


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

                        $output .= '<div class="post-nav col-md-12">';
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

    add_shortcode('carousel_recent_posts', 'carousel_recent_posts');













/*recent posts carousel end*/

/*recent posts thumb start*/
if ( ! function_exists('thumb_recent_posts') ) {
        function thumb_recent_posts( $atts ){

            $atts = shortcode_atts( array(
                            'ptype' => '',
                            'per_page'  =>      2,
                            'order'     =>  'DESC',
                            'orderby'   =>  'date',
                            'category' => '',
                            'class' => '',
                            'column' => '',
                    ), $atts );

            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            $class = $atts['class'];
            $column = $atts['column'];

            $args = array(
                'post_type'    =>  $atts["ptype"],
                'posts_per_page'    =>  $atts["per_page"],
                'order'             =>  $atts["order"],
                'orderby'           =>  $atts["orderby"],
                'paged'             =>  $paged,
                'category_name' => $category
            );

            $query = new WP_Query($args);

                                            $output .= '<div class="row '.$class.'">';

                    if($query->have_posts()) : $output;

                        while ($query->have_posts()) : $query->the_post();

                            $output .= '<div id="post-' . get_the_ID() . '" class="'.$column.' ' . implode(' ', get_post_class()) . '">';

                                        $output .= '<div class="thumbnail">';

                                        $output .= '<a href="' . get_permalink() . '" title="' . the_title('','',false) . '">';

                                            if ( has_post_thumbnail() ) {

                                                $output .= get_the_post_thumbnail( get_the_id(), 'post_thumbnail_lg', array('class' => 'img-responsive aligncenter'));

                                            } else {


                                            }

                                        $output .= '</a>';
                                        $output .= '<div class="caption caption-fixedh">';

                                $output .= '<h3 class="post-title"><span><a href="' . get_permalink() . '" title="' . the_title('','',false) . '">' . the_title('','',false) . '</a></span></h3>';

                                        $output .= get_the_excerpt();

                                        $output .= '<div class="clearfix"></div>';
                                        $output .= '</div>';


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

                        $output .= '<div class="post-nav col-md-12">';
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

    add_shortcode('thumb_recent_posts', 'thumb_recent_posts');

/*recent posts thumb end*/