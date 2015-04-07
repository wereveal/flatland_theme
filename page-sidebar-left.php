<?php
/**
 * Template Name: Sidebar Left
 * The template for displaying pages with a left sidebar.
 *
 * @package Flatland
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div id="primary" class="col-md-9 col-lg-9 col-md-push-3 col-lg-push-3">
            <main id="main" class="site-main" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'page'); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
    	</div><!-- #primary -->

<?php get_sidebar('left'); ?>

    </div> <!-- .row -->
</div> <!-- .container -->

<?php get_footer(); ?>
