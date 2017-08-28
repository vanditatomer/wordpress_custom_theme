<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

//echo "page.php";

get_header(); ?>

<hr class="horizontal-line">

	<div class="flex">
		<div id="primary" class="content-area contact-section">
			<main id="main" class="site-main" role="main">
				<h2><?php echo strtoupper(get_the_title()); ?></h2>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php endwhile; // End of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		    <div id="sidebar2" class="flex flex-column sidebar-widget" role="complementary">
		    	<?php dynamic_sidebar( 'sidebar-2' ); ?>
		    </div>
		<?php endif; ?>

	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>