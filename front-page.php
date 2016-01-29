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

<?php if( have_rows('slider', 20)): ?>

    <ul class="bxslider">

    <?php while( have_rows('slider', 20)): the_row(); 

        // vars
        $image = get_sub_field('image');
        $link = get_sub_field('url');

        ?>

        <li>

            <?php if( $link ): ?>
                <a href="<?php echo $link; ?>">
            <?php endif; ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

            <?php if( $link ): ?>
                </a>
            <?php endif; ?>

        </li>

    <?php endwhile; ?>

    </ul>

<?php endif; ?>

<section id="primary" role="main" class="col">


    <?php if ( have_posts() ) : ?>
        <!-- there IS content for this query -->

        <?php // check if we're on an archive page
        if ( is_archive() ) :
            // if so, print the archive title before the loop begins
            get_template_part( 'inc/archive-header' );
        endif; ?>


        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <span class="entry-date"><?php echo get_the_date(); ?></span>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'starter-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
                </div><!-- .entry-content -->

                <footer class="entry-meta">
                    <span>
                    <div class="comments-link">
                        <?php comments_popup_link( 
                             __( 'Leave a comment', 'starter-theme' ), 
                             __( '1 comment', 'starter-theme' ), 
                             __( '% comments', 'starter-theme' ) ); 
                        ?>
                    </div>
                    </span>
                    <span class="postmeta">
                    <?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'starter-theme' ) , ', ', '</div>' ); ?>
                    </span>
                </footer><!-- #entry-meta -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>

        <nav id="nav-below">
            <div class="nav-previous"><?php next_posts_link( __( "Older posts", "starter-theme" ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( "Newer posts", "starter-theme" ) ); ?></div>
        </nav><!-- #nav-above -->

    <?php else : ?>
        <!-- there IS NOT content for this query -->

        <article id="post-0" class="hentry post no-results not-found">
            <header class="entry-header">
                <h1><?php _e( "Oops!", "starter-theme" ); ?></h1>
            </header><!-- .entry-header -->

            <p><?php _e( "We can&#039;t find content for this page!", "starter-theme" ); ?></p>
        </article><!-- #post-0 -->

    <?php endif; ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>