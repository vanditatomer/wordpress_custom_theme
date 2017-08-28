<?php

 // register custom post types and taxonomies

function register_post_info() {
	$a = array(
		"Adventures" => "",
		"Products" => "Activity",
	);

	foreach ($a as $post => $tax) {
		$postArgs = get_post_args($post);
		register_post_type( strtolower($post), $postArgs );

		if (is_array($tax)) {
			foreach ($tax as $item) {
				$taxArgs = get_tax_args($item);
				register_taxonomy( strtolower($item), array(strtolower($post)), $taxArgs );			
			}
		}
		elseif ($tax != "") {
			$taxArgs = get_tax_args($tax);
			register_taxonomy( strtolower($tax), array(strtolower($post)), $taxArgs );			
		}
	}
}

add_action( 'init', 'register_post_info', 0);

?>
