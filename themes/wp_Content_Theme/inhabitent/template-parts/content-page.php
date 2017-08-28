<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package RED_Starter_Theme
 */
//echo "content-page.php";

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<h2><?php //echo "title1"; ?></h2>

		<?php the_content(); ?>

		<div class="about">

<?php
		if (get_field('title_1')) {?>
			<h2><?php echo get_field('title_1'); ?></h2>
		<?php
		} ?>

		<?php
		if (get_field('content_1')) {?>
			<p><?php echo get_field('content_1'); ?></p>
		<?php
		} ?>

		<?php
		if (get_field('title-2')) {?>
			<h2><?php echo get_field('title_2'); ?></h2>
		<?php
		} ?>

		<?php
		if (get_field('content_2')) {?>
			<p><?php echo get_field('content_2'); ?></p>
		<?php
		} ?>

		<?php
		if (get_field('title_3')) {?>
			<h2><?php echo get_field('title_3'); ?></h2>
		<?php
		} ?>

		<?php
		if (get_field('content_3')) {?>
			<p><?php echo get_field('content_3'); ?></p>
		<?php
		} ?>

		<?php
		if (get_field('contact_form')) {?>
			<p><?php echo get_field('contact_form'); ?></p>
		<?php
		} ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->