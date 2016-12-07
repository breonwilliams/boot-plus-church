<?php get_header(); ?>
    <div <?php post_class('container'); ?>>
        <article>

            <main id="main" class="site-main col-md-12" role="main">
                <?php while (have_posts()) { the_post(); ?>
                    <header class="entry-header">
                        <h1 class='entry-title page-header'><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    <div class="row">
                        <div class="col-xs-6">
                            <?php if( get_field('scripture') ): ?>
                                <p class="lead"><?php the_field('scripture'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-6 text-right">
                            <?php if( get_field('video') ): ?>
                                <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-md marginbot-15" data-lity>Watch Now <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                            <?php endif; ?>
                            <?php if( get_field('audio') ): ?>
                                <a href="<?php the_field('audio'); ?>" data-lity class="btn btn-bordered btn-primary btn-md marginbot-15">Listen Now <i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if( get_field('document') ): ?>
                                <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-md marginbot-15">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="entry-content">
                        <?php  the_content();  ?>
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    echo "\n\n";

                    bootstrapBasicPagination();

                    echo "\n\n";

                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) {
                        comments_template();
                    }

                    echo "\n\n";

                } //endwhile;
                ?>
            </main>
        </article>
    </div>
<?php get_footer(); ?>