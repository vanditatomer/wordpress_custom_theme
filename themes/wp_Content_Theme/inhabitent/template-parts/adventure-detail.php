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
	<header class="entry-header adventure-entry">
		<?php
			if (get_post_type() == 'adventures') {?>
				<div>
					<h1><?php echo strtoupper(strip_tags(get_the_title())); ?></h1>
				</div>
				<div class="entry-meta">
					<?php echo '<h3>BY '.strtoupper(strip_tags(get_the_author())).'</h3>'; ?>
				</div><!-- .entry-meta -->
		<?php
			}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content adventure-content">
		<?php echo '<h5>'.strip_tags(get_the_content()).'</h5>'; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
