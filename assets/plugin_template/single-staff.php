<?php get_header(); ?>
<article class="col-md-12">


        <main id="main" class="site-main" role="main">
            <?php while (have_posts()) { the_post(); ?>

                <?php if(has_post_thumbnail()): ?>
                    <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                        <div class="thumbnail-img">
                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post_thumbnail_square'); } ?>
                        </div>
                    </a>

                <?php else: ?>

                <?php endif; ?>



                <header class="entry-header">
                    <h1 class='entry-title page-header'><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
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