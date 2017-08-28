<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>
			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div style="background: url(<?php echo get_bloginfo('url').'/wp-content/uploads/2017/08/dark-wood.png'; ?>) repeat; background-size: 40%;">
				    <div id="footer1" class="flex footer-widget" role="complementary">
				    	<?php dynamic_sidebar( 'footer-1' ); ?>
				    </div>
					<div class="copyright">
						<p>COPYRIGHT &COPY <?php echo date('Y'); ?> INHABITENT</p>
					</div>
			    </div>
<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>
