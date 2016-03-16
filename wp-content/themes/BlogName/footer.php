<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container-fluid">
			<span class="copyright">© Copyright 2012</span>
			<div class="social-icon ">
				<ul>
					<li><a class="fa fa-facebook" href="<?php echo get_theme_mod('social_icon_facebook');?>"></a></li>
					<li><a class="fa fa-twitter" href="<?php echo get_theme_mod('social_icon_twitter');?>"></a></li>
					<li><a class="fa fa-linkedin" href="<?php echo get_theme_mod('social_icon_linkedin');?>"></a></li>
				</ul>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
