<?php
/**
 * Template part for displaying posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header product-box">

		<a href="<?php the_permalink(); ?>">
			<div class="product-image-square">
				<?php
				if ( has_post_thumbnail() ) {
		    		the_post_thumbnail('square');
				}
				?>
			</div>
			<div class="product-price-box">
				<!-- <p><span><?php echo str_pad(get_the_title(), 20, '.'); ?></span><span><?php echo '$'.number_format(get_field('price'), 2, '.', ','); ?></span></p> -->

			</div>
		</a>

	</header><!-- .entry-header -->
</article><!-- #post-## -->
