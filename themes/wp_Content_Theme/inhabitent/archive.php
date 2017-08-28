<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

//echo "archive.php";

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header" style="text-align: center;">
				<p style="font-size: 3rem;"><b><?php echo str_replace(": ","",get_the_archive_title()); ?></b></p>
					<!-- the_archive_title(); -->
				<div style="font-size: 1.25rem;">
					<?php the_archive_description(); ?>
				</div>
			</header><!-- .page-header -->

	<div style="border-bottom-style: dashed; border-bottom-width: 1px; border-color: lightgrey; margin: 3rem 6rem 4rem 6rem;">
	</div>

		<div class="flex flex-wrap" style="width: 100%; padding: 0 5rem 5rem 5rem;">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		<div class="flex flex-column flex-items-center" style="width: 23%; margin: 0 1% 0 1%;">
				<?php
					//get_template_part( 'template-parts/content' );
					get_template_part( 'template-parts/content', 'product' );
				?>
		</div>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
		</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
