<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package Starter_Theme
 */
?>

    </div><!-- #main -->

</div><!-- #page -->

<footer id="colophon" role="contentinfo">
	<?php if ( is_front_page() ) : ?> 
		<script>
		jQuery(document).ready(function($){ $('.bxslider').bxSlider();
		});
		</script> 
	<?php  endif; ?>

    <div id="copyright">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>
        <a href="http://twodelighted.com" rel="nofollow">theme by Colleen Geohagan</a>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?> 
</body>
</html>