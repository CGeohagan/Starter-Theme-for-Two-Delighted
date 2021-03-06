<?php
/**
 * Main Template File
 * 
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starter_Theme
 */

get_header(); ?>

<section id="primary" role="main">

    <?php if ( have_posts() ) : ?>
        <!-- there IS content for this query -->

        <?php // check if we're on an archive page
        if ( is_archive() ) :
            // if so, print the archive title before the loop begins
            get_template_part( 'inc/archive-header' );
        endif; ?>


        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <!-- Remember, this markup is repeated for each post -->
            <div class="grid-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                    <h2 class="caption"><?php the_title(); ?></h2>
                </a>
            </div>

        <?php endwhile; ?>

        <nav id="nav-below">
            <div class="nav-previous"><?php next_posts_link( __( "Older posts", "starter-theme" ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( "Newer posts", "starter-theme" ) ); ?></div>
        </nav><!-- #nav-above -->

    <?php else : ?>
        <!-- there IS NOT content for this query -->

        <h1>Nothing Found</h1>
        <p>Sorry, but there are no posts to display!</p>

    <?php endif; ?>

</section><!-- #primary -->

<?php get_footer(); ?>