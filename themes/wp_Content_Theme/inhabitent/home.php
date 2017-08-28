<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
//echo "home.php";

get_header(); ?>

<hr class="horizontal-line">

	<div class="flex">
		<div id="primary" class="content-area journal-post">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php //the_post_navigation(); ?>

				<div class="read-more-journal">
					<a href="<?php the_permalink(); ?>">
						<p>READ MORE&nbsp;&rarr;</p>
					</a>
				</div>
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

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		    <div id="sidebar2" class="flex flex-column sidebar-widget" role="complementary">
		    	<?php dynamic_sidebar( 'sidebar-2' ); ?>
		    </div>
		<?php endif; ?>

	</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
