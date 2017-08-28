<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

//echo "archive-products.php";

get_header(); ?>
<hr>
<div class="shop-stuff-archive">
	<p><b>SHOP STUFF</b></p>
</div>

<div class="flex flex-justify-center terms-menu">

<?php

$terms = get_terms([
    'taxonomy' => 'activity',
    'hide_empty' => false,
]);

$count = count($terms);

if ( $count > 0 ) {
	foreach ( $terms as $term ) {
		?>
		<div class="terms-menu-item">
		<?php
		?>
			<a href="<?php echo get_term_link($term); ?>">
				<?php echo $term->name; ?>
			</a>
		</div>
<?php
	}
}

?>
</div>

	<div class="product-archive-border"></div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header" style="text-align: center;">
			</header><!-- .page-header -->
		<div class="flex flex-wrap" style="width: 100%; padding: 0 5rem 5rem 5rem;">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

		<div class="flex flex-column flex-items-center" style="width: 23%; margin: 0 1% 0 1%;">
				<?php
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

<?php get_footer(); ?>
