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
	<header class="entry-header" style="color: black;">
		<?php
			if (get_post_type() == 'post' || get_post_type() == 'products') {
 				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'large' );
 				}
			}
		?>
		<h1 style="font-size: 3rem;"><?php echo strtoupper(get_the_title()); ?></h1>

		<div class="entry-meta">
			<?php echo 'BY '.strtoupper(get_the_author()); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content" style="font-size: 1.5rem; color: black;">
		<?php the_content(); ?>
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

