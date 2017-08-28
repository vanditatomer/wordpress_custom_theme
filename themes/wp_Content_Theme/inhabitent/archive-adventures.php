<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<hr>
<div class="adventures-archive">
	<p><b>LATEST ADVENTURES</b></p>
</div>

<div class="adventures-archive-border"></div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="flex flex-wrap adventures" style="width: 100%; padding: 0 4rem 5rem 4rem;">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="flex flex-column flex-items-center" style="width: 50%; margin: 0 0 0 0;">

				<div class="flex flex-column flex-items-center">

					<div class="adventure-archive-box" <?php echo get_adventure_image(get_field("banner")); ?> >
						<a href="<?php echo get_the_permalink(); ?>">
							<div>
								<div class="adventure-title">
									<p><?php echo get_the_title(); ?></p>
								</div>
								<div class="read-more-button">
									<p>READ MORE</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

			<?php the_posts_navigation(); ?>
		</div>

<?php get_footer(); ?>
