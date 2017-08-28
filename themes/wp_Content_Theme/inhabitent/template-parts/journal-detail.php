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
	<header class="entry-header journal-entry">
		<?php
			if (get_post_type() == 'post' || get_post_type() == 'products') {
 				if ( has_post_thumbnail() ) {?>
					<div class="journal-image" style="background: url(<?php the_post_thumbnail_url( 'large' ); ?>) no-repeat center bottom; background-size: cover;">
						<!-- <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->
						<div class="flex flex-column flex-justify-between journal-image-box">
							<div>
								<h1><?php echo strtoupper(get_the_title()); ?></h1>
							</div>
							<div class="entry-meta flex flex-justify-end">
								<h3>
									<?php red_starter_posted_on(); ?> / <?php red_starter_comment_count(); ?> / <?php red_starter_posted_by(); ?>
								</h3>
							</div><!-- .entry-meta -->
						</div>
					</div>
					<?php
 				}
			}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content journal-content">
		<?php echo '<p>'.strip_tags(get_the_content()).'</p>'; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
