<?php
/**
 * Custom functions
 */

/*sermon posts start*/
add_shortcode( 'sermon_datatables', 'sermon_datatables' );
function sermon_datatables( $atts ) {

    wp_enqueue_script( 'dataTables-init' );
    wp_enqueue_script( 'dataTables-min' );
    wp_enqueue_script( 'buttons-min' );
    wp_enqueue_script( 'colVis-js' );
    wp_enqueue_script( 'html5-js' );
    wp_enqueue_script( 'print-js' );
    wp_enqueue_script( 'databootstrap-js' );
    wp_enqueue_script( 'buttonsboot-js' );
    wp_enqueue_script( 'jszip-js' );
    wp_enqueue_script( 'pdfmake-js' );
    wp_enqueue_script( 'vfs_fonts-js' );
    wp_enqueue_script( 'responsive-js' );
    wp_enqueue_script( 'responsive-bootstrap' );
    wp_enqueue_style( 'dataTables-css' );
    wp_enqueue_style( 'dataTables-bootstrap' );
    wp_enqueue_style( 'dataTables-buttons' );
    wp_enqueue_style( 'dataTables-responsive' );
    wp_enqueue_script( 'moment-js' );
    wp_enqueue_script( 'datetime-js' );

    wp_enqueue_script( 'lity-js' );
    wp_enqueue_style( 'lity-css' );
    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => -1,
        'category' => '',
        'ptype' => 'sermons',
        'sermon_category' => '',
        'order'     =>  '',
        'orderby'   =>  '',
    ), $atts ) );


    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'sermon_category' => $sermon_category,
        'order'             =>  $order,
        'orderby'           =>  $orderby,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <table id="sermonTable" class="table table-1 table-striped dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Sermon Date</th>
                <th>Sermon Title</th>
                <th>Scripture</th>
                <th>Speaker</th>
                <th>Media</th>
            </tr>
            </thead>
            <tbody>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <tr>
                    <td scope="row">
                        <span><?php echo get_the_date('D, F jS, Y'); ?> </span>
                    </td>
                    <td scope="row">
                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
                    </td>
                    <td>
                        <?php if( get_field('scripture') ): ?>
                            <p class="s-scripture"><em><?php the_field('scripture'); ?></em></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if( get_field('speaker') ): ?>
                            <p class="s-speaker"><?php the_field('speaker'); ?></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if( get_field('video') ): ?>
                            <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-video" data-lity>Watch Now <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                        <?php endif; ?>
                        <?php if( get_field('audio') ): ?>
                            <a href="<?php the_field('audio'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-audio" data-lity>Listen Now <i class="fa fa-headphones" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if( get_field('document') ): ?>
                            <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-document">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile;
            wp_reset_postdata(); ?>


            </tbody>
        </table>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}




/*sermon posts end*/


if ( ! function_exists('sermon_tables') ) {
    function sermon_tables( $atts ){
        wp_enqueue_script( 'lity-js' );
        wp_enqueue_style( 'lity-css' );

        $atts = shortcode_atts( array(
            'ptype' => 'sermons',
            'per_page'  =>      1,
            'order'     =>  'DESC',
            'orderby'   =>  'date',
            'category' => '',
            'class' => '',
            'column' => '',
            'pagination' => '',
            'sermon_category' => '',
        ), $atts );

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $class = $atts['class'];
        $pagination = $atts['pagination'];

        $args = array(
            'post_type'    =>  $atts["ptype"],
            'posts_per_page'    =>  $atts["per_page"],
            'order'             =>  $atts["order"],
            'orderby'           =>  $atts["orderby"],
            'sermon_category' => $atts["sermon_category"],
            'paged'             =>  $paged,
            'category_name' => $category
        );

        $query = new WP_Query($args);

        $output .= '<ul class="' . $class . ' respList-wrap">';

        if($query->have_posts()) : $output;

            while ($query->have_posts()) : $query->the_post();

                $output .= '<li id="post-' . get_the_ID() . '" class="resplist-item ' . implode(' ', get_post_class()) . '">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-6">';
                $output .= '<div class="row">';
                $output .= '<div class="col-sm-6">';

                $output .= '<h3 class="post-title"><span><a href="' . get_permalink() . '" title="' . the_title('','',false) . '">' . the_title('','',false) . '</a></span></h3>';
                $output .= '<span class="sermon-date">';
                $output .= get_the_date();
                $output .= '</span>';
                $output .= '</div>';
                $output .= '<div class="col-sm-6">';
                if ( get_field('scripture' )) {
                    $output .= '<p class="s-scripture">';
                    $output .= get_field('scripture');
                    $output .= '</p>';
                } else {
                }
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';

                $output .= '<div class="col-md-6">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-4 col-sm-6">';

                if ( get_field('speaker' )) {
                    $output .= '<p class="s-speaker">';
                    $output .= get_field('speaker');
                    $output .= '</p>';
                } else {
                }

                $output .= '</div>';
                $output .= '<div class="col-md-8 col-sm-6 text-right">';
                $output .= '<ul class="list-inline">';

                if ( get_field('video' )) {
                    $output .= '<li><a href="' . get_field('video') . '" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-video" data-lity>';
                    $output .= 'Watch Now <i class="fa fa-video-camera" aria-hidden="true"></i> ';
                    $output .= '</a></li>';

                } else {
                }

                if ( get_field('audio' )) {
                    $output .= '<li><a href="' . get_field('audio') . '" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-audio" data-lity>';
                    $output .= 'Listen Now <i class="fa fa-headphones" aria-hidden="true"></i> ';
                    $output .= '</a></li>';

                } else {
                }
                if ( get_field('document' )) {
                    $output .= '<li><a href="' . get_field('document') . '" class="btn btn-bordered btn-primary btn-sm marginbot-15 s-document">';
                    $output .= 'Doc <i class="fa fa-file-o" aria-hidden="true"></i> ';
                    $output .= '</a></li>';

                } else {
                }

                $output .= '</ul>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</li>';



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

add_shortcode('sermon_tables', 'sermon_tables');
