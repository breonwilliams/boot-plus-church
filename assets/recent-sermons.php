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
    wp_enqueue_script( 'lity-js' );
    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => -1,
        'category' => '',
        'ptype' => 'sermons',
        'sermon_category' => '',
    ), $atts ) );


    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'sermon_category' => $sermon_category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <table id="sermonTable" class="table table-1 table-striped dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="col-md-3">Sermon Title</th>
                <th class="col-md-3">Scripture</th>
                <th class="col-md-3">Speaker</th>
                <th class="col-md-3">Media</th>
            </tr>
            </thead>
            <tbody>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <tr>
                    <td scope="row">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                    </td>
                    <td>
                        <?php if( get_field('scripture') ): ?>
                            <p><em><?php the_field('scripture'); ?></em></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if( get_field('speaker') ): ?>
                            <p><?php the_field('speaker'); ?></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if( get_field('video') ): ?>
                            <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15" data-lity>Video <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                        <?php endif; ?>
                        <?php if( get_field('audio') ): ?>
                            <a href="<?php the_field('audio'); ?>" data-lity class="btn btn-bordered btn-primary btn-sm marginbot-15">Audio <i class="fa fa-headphones" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if( get_field('document') ): ?>
                            <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
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



add_shortcode( 'sermon_tables', 'sermon_tables' );
function sermon_tables( $atts ) {
    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => -1,
        'category' => '',
        'ptype' => 'sermons',
        'sermon_category' => '',
    ), $atts ) );


    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'sermon_category' => $sermon_category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <ul class="sermonList-wrap">


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="sermonsList">
                    <div class="row">
                        <div class="col-sm-3"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></div>
                        <div class="col-sm-3">
                            <?php if( get_field('scripture') ): ?>
                                <p><em><?php the_field('scripture'); ?></em></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php if( get_field('speaker') ): ?>
                                <p><?php the_field('speaker'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php if( get_field('video') ): ?>
                                <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15" data-lity>Video <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                            <?php endif; ?>
                            <?php if( get_field('audio') ): ?>
                                <a href="<?php the_field('audio'); ?>" data-lity class="btn btn-bordered btn-primary btn-sm marginbot-15">Audio <i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if( get_field('document') ): ?>
                                <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
                            <?php endif; ?>
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
/*sermon posts end*/
