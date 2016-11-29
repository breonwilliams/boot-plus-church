<?php
/**
 * Custom functions
 */

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


