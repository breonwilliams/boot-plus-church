<?php get_header(); ?>
        <article <?php post_class(); ?>>

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
                                <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15" data-lity>Watch Now <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                            <?php endif; ?>
                            <?php if( get_field('audio') ): ?>
                                <a href="<?php the_field('audio'); ?>" data-lity class="btn btn-bordered btn-primary btn-sm marginbot-15">Listen Now <i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if( get_field('document') ): ?>
                                <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="entry-content">
                        <?php  the_content();  ?>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                } //endwhile;
                ?>
            </main>
        </article>
<?php get_footer(); ?>