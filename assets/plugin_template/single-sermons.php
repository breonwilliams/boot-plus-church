<?php get_header(); ?>
<article class="col-md-12">


        <main id="main" class="site-main" role="main">
            <?php while (have_posts()) { the_post(); ?>
                <header class="entry-header">
                    <h1 class='entry-title page-header'><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
                <?php if( get_field('video') ): ?>
                    <a href="<?php the_field('video'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15" data-lity>Video <i class="fa fa-video-camera" aria-hidden="true"></i> </a>
                <?php endif; ?>
                <?php if( get_field('audio') ): ?>
                    <a href="<?php the_field('audio'); ?>" data-lity class="btn btn-bordered btn-primary btn-sm marginbot-15">Audio <i class="fa fa-headphones" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if( get_field('document') ): ?>
                    <a href="<?php the_field('document'); ?>" class="btn btn-bordered btn-primary btn-sm marginbot-15">Doc <i class="fa fa-file-o" aria-hidden="true"></i></a>
                <?php endif; ?>
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
<?php get_footer(); ?>