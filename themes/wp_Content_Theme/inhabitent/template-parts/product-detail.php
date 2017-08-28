<?php
/**
 * Template part for displaying single posts.
 *
 * @package RED_Starter_Theme
 */

if (get_post_type() == "adventures") {
	//get_sidebar();
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header" style="color: black;">
	</header> -->

	<div class="flex">
	<div class="product-image-large">
		<?php
			if (get_post_type() == 'post' || get_post_type() == 'products') {
 				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'large' );
 				}
			}
		?>
	</div>

	<div class="product-detail">
		<h1><?php echo strtoupper(get_the_title()); ?></h1>
		<!-- <h3><?php echo '$'.number_format(get_field('price'), 2, '.', ','); ?></h3> -->
		<div class="entry-content">
			<?php echo '<p>'.strip_tags(get_the_content()).'</p>'; ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<div class="read-entry">
			<a href="http://www.facebook.com" style="border-style: solid; border-width: 1px; border-color: black; padding: 1rem 2rem 1rem 2rem; color: black;"><i class="fa fa-facebook" aria-hidden="true" style="padding-right: 0.5rem;"></i>LIKE</a>
			<a href="http://www.twitter.com" style="border-style: solid; border-width: 1px; border-color: black; padding: 1rem 2rem 1rem 2rem; color: black;"><i class="fa fa-twitter" aria-hidden="true" style="padding-right: 0.5rem;"></i>TWEET</a>
			<a href="http://www.pinterest.com" style="border-style: solid; border-width: 1px; border-color: black; padding: 1rem 2rem 1rem 2rem; color: black;"><i class="fa fa-pinterest" aria-hidden="true" style="padding-right: 0.5rem;"></i>PIN</a>
		</div>
	</div>
	</div>

	<footer class="entry-footer">
		<?php red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
