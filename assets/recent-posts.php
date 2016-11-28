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

/*recent posts thumbnail start*/
add_shortcode( 'thumb_recent_posts', 'thumb_recent_posts' );
function thumb_recent_posts( $atts ) {

    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => 4,
        'category' => '',
        'ptype' => '',
        'class' => '',
        'column' => '',
    ), $atts ) );

    $class = $atts['class'];
    $column = $atts['column'];

    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <?php echo ' <div class="row '.$class.'"> '; ?>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

             <?php echo ' <div class="'.$column.'"> '; ?>
                <div class="thumbnail">
                    <?php if(has_post_thumbnail()): ?>
                        <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                            <div class="thumbnail-img">
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post_thumbnail_square'); } ?>
                            </div>
                        </a>

                    <?php else: ?>

                    <?php endif; ?>

                    <div class="caption caption-fixedh">
                        <h3 class="thumb-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>


        </div>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

/*recent posts thumbnail end*/

/*recent posts carousel start*/
add_shortcode( 'carousel_recent_posts', 'carousel_recent_posts' );
function carousel_recent_posts( $atts ) {
    wp_enqueue_script( 'slick-js' );
    wp_enqueue_script( 'slick-init' );

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

        <?php echo ' <div class="'.$class.'"> '; ?>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <div>
                <div class="thumbnail thumb-carousel">
                    <?php if(has_post_thumbnail()): ?>
                        <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                            <div class="thumbnail-img">
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post_thumbnail_lg'); } ?>
                            </div>
                        </a>

                    <?php else: ?>

                    <?php endif; ?>

                    <div class="caption caption-fixedh">
                        <h3 class="thumb-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>


        </div>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

/*recent posts carousel end*/

/*staff thumbnail start*/
add_shortcode( 'staff_posts', 'staff_posts' );
function staff_posts( $atts ) {

    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => 4,
        'category' => '',
        'ptype' => 'staff',
        'class' => '',
        'column' => '',
        'role' => '',
    ), $atts ) );

    $class = $atts['class'];
    $column = $atts['column'];

    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'role' => $role,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <?php echo ' <div class="row staff-list '.$class.'"> '; ?>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

             <?php echo ' <div class="'.$column.'"> '; ?>
                <div class="thumbnail">
                    <?php if(has_post_thumbnail()): ?>
                        <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                            <div class="thumbnail-img">
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post_thumbnail_square'); } ?>
                            </div>
                        </a>

                    <?php else: ?>

                    <?php endif; ?>

                    <div class="caption caption-fixedh">
                        <h3 class="thumb-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
                        <?php if( get_field('staff_title') ): ?>
                        <p><strong><?php the_field('staff_title'); ?></strong></p>
                        <?php endif; ?>
                        <?php if( get_field('email') ): ?>
                        <p><a href="mailto:<?php the_field('email'); ?>" class="staff_email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></p>
                        <?php endif; ?>
                        <?php if( get_field('phone_number') ): ?>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('phone_number'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>


        </div>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

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
    ), $atts ) );


    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
        'category_name' => $category,
        'role' => $role,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>

        <table id="staffTable" class="table table-1 table-striped dt-responsive" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="col-md-3">Name</th>
        <th class="col-md-3">Title</th>
        <th class="col-md-3">Email</th>
        <th class="col-md-3">Phone Number</th>
      </tr>
    </thead>
    <tbody>


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

<tr>
        <td scope="row">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'heels'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
        </td>
        <td>
          <?php if( get_field('staff_title') ): ?>
                        <p><strong><?php the_field('staff_title'); ?></strong></p>
                        <?php endif; ?>
        </td>
        <td>
          <?php if( get_field('email') ): ?>
                        <p><a href="mailto:<?php the_field('email'); ?>" class="staff_email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></p>
                        <?php endif; ?>
        </td>
        <td>
          <?php if( get_field('phone_number') ): ?>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('phone_number'); ?></p>
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

/*staff table end*/

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
        <th class="col-md-3">Book</th>
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
          <?php if( get_field('book') ): ?>
                        <p><em><?php the_field('book'); ?></em></p>
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
          <?php if( get_field('book') ): ?>
                        <p><em><?php the_field('book'); ?></em></p>
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

