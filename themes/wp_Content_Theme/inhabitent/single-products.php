<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

//echo "single-products.php";

get_header(); ?>
<hr>
	<div id="primary" class="content-area">
		<main id="main" class="site-main product" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/product', 'detail' ); ?>
			<?php //the_post_navigation(); ?>

			<?php
				if (get_post_type() == "post") {
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				}
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
