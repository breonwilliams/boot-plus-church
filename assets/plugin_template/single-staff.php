<?php get_header(); ?>
    <div <?php post_class('container'); ?>>
        <article>


            <main id="main" class="site-main col-md-12" role="main">
                <?php while (have_posts()) { the_post(); ?>

                <div class="row">


                    <?php if(has_post_thumbnail()): ?>
                    <div class="col-sm-3">
                        <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                            <div class="thumbnail-img">
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post_thumbnail_square'); } ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <?php else: ?>
                        <div class="col-sm-12">
                            <?php endif; ?>



                            <header class="entry-header">
                                <h1 class='entry-title page-header'><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->

                            <ul class="list-inline lead">
                                <?php if( get_field('staff_title') ): ?>
                                    <li><strong><?php the_field('staff_title'); ?></strong></li>
                                <?php endif; ?>
                                <?php if( get_field('email') ): ?>
                                    <li><a href="mailto:<?php the_field('email'); ?>" class="staff_email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a></li>
                                <?php endif; ?>
                                <?php if( get_field('phone_number') ): ?>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('phone_number'); ?></li>
                                <?php endif; ?>
                            </ul>

                            <div class="entry-content">
                                <?php  the_content();  ?>
                                <div class="clearfix"></div>
                            </div>

                            <?php
                            } //endwhile;
                            ?>
                        </div>
                    </div>
            </main>
        </article>
    </div>
<?php get_footer(); ?>