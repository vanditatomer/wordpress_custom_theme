<?php get_header(); ?>
<div class="shop-stuff-main">
	<p>SHOP STUFF</p>
</div>
<div class="flex terms">
	<?php
	$terms = get_terms([
	    'taxonomy' => 'activity',
	    'hide_empty' => false,
	]);
	$count = count($terms);
	if ( $count > 0 ) {
		foreach ( $terms as $term ) {
	?>
			<div class="term-box">
				<a href="<?php echo get_term_link($term); ?>">
					<div class="flex flex-column flex-items-center">
						<div class="term-image">
							<img src="<?php echo get_bloginfo('template_url').'/assets/images/product-type-icons/'.$term->slug.'.svg'; ?>" />
						</div>
						<div class="term-description">
							<p><?php echo $term->description; ?></p>
						</div>
						<div class="term-button">
							<p><?php echo $term->name.' STUFF'; ?></p>
						</div>
					</div>
				</a>
			</div>
	<?php
		}
	}
	?>
</div>

<div class="journal-heading">
	<p>INHABITENT JOURNAL</p>
</div>

<div class="flex journal">
	<?php
	$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '3', ) );
	while ( $loop->have_posts() ) : $loop->the_post();
	?>
		<div class="flex flex-column flex-items-center journal-box">
			<a href="<?php the_permalink(); ?>">
				<div>
					<?php
					if ( has_post_thumbnail() ) {
			    		the_post_thumbnail();
					}
					?>
				</div>
				<div class="journal-details">
					<div class="journal-date-comments">
						<p><?php the_date(); echo ' / '.get_comments_number().' Comments'; ?></p>
					</div>
					<div class="journal-title">
						<p><b><?php the_title(); ?></b></p>
					</div>
					<div class="read-entry-button">
						<p>READ ENTRY</p>
					</div>
				</div>
			</a>
		</div>
	<?php
	endwhile;
	?>
</div>

<div class="adventures-heading">
	<p>LATEST ADVENTURES</p>
</div>

<?php
$adventures = array();
$loop = new WP_Query( array( 'post_type' => 'adventures', 'posts_per_page' => '4', ) );
while ( $loop->have_posts() ) : $loop->the_post();
	$image = get_field("banner");
	$title = get_the_title();
	$link = get_the_permalink();
	
	$adventures[] = array("image" => $image, "title" => $title, "link" => $link);
endwhile;
?>

<div class="flex adventures">

	<div class="flex flex-column flex-items-center">
		<div class="adventure-box-half" <?php echo get_adventure_image($adventures[0]['image']); ?> >
 			<a href="<?php echo $adventures[0]['link']; ?>">
				<div>
					<div class="adventure-title">
						<p><?php echo $adventures[0]['title']; ?></p>
					</div>
					<div class="read-more-button">
						<p>READ MORE</p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="flex flex-column">
		<div class="adventure-box-quarter" <?php echo get_adventure_image($adventures[1]['image']); ?> >
			<a href="<?php echo $adventures[1]['link']; ?>">
				<div>
					<div class="adventure-title">
						<p><?php echo $adventures[1]['title']; ?></p>
					</div>
					<div class="read-more-button">
						<p>READ MORE</p>
					</div>
				</div>
			</a>
		</div>
		<div class="flex" style="height: 100%;">
			<div class="adventure-box-eighth" <?php echo get_adventure_image($adventures[2]['image']); ?> >
				<a href="<?php echo $adventures[2]['link']; ?>">
					<div class="adventure-title">
						<p><?php echo $adventures[2]['title']; ?></p>
					</div>
					<div class="read-more-button">
						<p>READ MORE</p>
					</div>
				</a>
			</div>
			<div class="adventure-box-eighth" <?php echo get_adventure_image($adventures[3]['image']); ?> >
				<a href="<?php echo $adventures[3]['link']; ?>">
					<div class="adventure-title">
						<p><?php echo $adventures[3]['title']; ?></p>
					</div>
					<div class="read-more-button">
						<p>READ MORE</p>
					</div>
				</a>
			</div>
		</div>
	</div>

</div>
<div class="more-adventures">
	<div class="more-adventures-button">
		<a href="<?php echo get_post_type_archive_link( 'adventures' ); ?>">MORE ADVENTURES</a>
	</div>
</div>

<?php get_footer(); ?>