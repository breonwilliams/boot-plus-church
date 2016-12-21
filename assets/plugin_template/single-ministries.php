<?php get_header(); ?>
        <article <?php post_class(); ?>>

            <main id="main" class="site-main col-md-12" role="main">
                <?php while (have_posts()) { the_post(); ?>
                    <header class="entry-header">
                        <h1 class='entry-title page-header'><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
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