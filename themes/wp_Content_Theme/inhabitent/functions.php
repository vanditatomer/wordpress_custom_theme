<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if ( ! function_exists( 'red_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function red_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size ( 'square', 500, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // red_starter_setup
add_action( 'after_setup_theme', 'red_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'red_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'red_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'red_starter_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'red_starter_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts() {
	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true);

	wp_enqueue_script( 'script', get_template_directory_uri() . '/build/js/script.min.js', array(), '20170824', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'red_starter_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer', 'wpf' ),
        'id' => 'footer-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );

	register_sidebar( array(
        'name' => __( 'Sidebar-2', 'wps' ),
        'id' => 'sidebar-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );

function add_search_box ( $items, $args ) {

	// only on primary menu
	if( 'primary' === $args -> theme_location )
		$items .= '<li class="menu-item menu-item-search">' . get_search_form( FALSE ) . '</li>';

	return $items;
}

add_filter( 'wp_nav_menu_items', 'add_search_box', 10, 2 );

function get_banner_image() {
	if(get_field("banner") && !is_post_type_archive( 'adventures' ))
	{
		if (is_front_page())
		{
			$align = 'top';
			$gradient = 'linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), ';
		}
		elseif (is_page('about'))
		{
			$align = 'bottom';
			$gradient = 'linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), ';
		}
		else
		{
			$align = 'bottom';
			$gradient = '';
		}

		return 'class="banner-image-on" style="background: '.$gradient.'url('.get_field("banner").') no-repeat center '.$align.'; background-size: cover;"';
	}
	else
	{
		return 'class="banner-image-off"';
	}
}

function get_banner_logo() {
	if (is_front_page()) {
		return '<img src="'.get_bloginfo('template_url').'/assets/images/inhabitent-logo-full.svg'.'" style="width: 22rem;" />';
	}
	elseif (is_page('about')) {
		return '<p style="font-size: 3.75rem; color: white; margin: 0; padding: 23rem 0 23rem 0;"><b>ABOUT</b></p>';
	}
	else
	{
		return "";
	}
}

function get_banner_home() {
	if (is_front_page() || (get_field("banner") && !is_post_type_archive( 'adventures' ))) {
		return '<img src="'.get_bloginfo('template_url').'/assets/images/inhabitent-logo-tent-white.svg'.'" style="width: 4rem; padding: 0 0 47rem 0;"/>';
	}
	else
	{
		return '<img src="'.get_bloginfo('template_url').'/assets/images/inhabitent-logo-tent.svg'.'" style="width: 4rem;"/>';
	}
}

function get_search_icon() {
	if (is_front_page() || (get_field("banner") && !is_post_type_archive( 'adventures' ))) {
		return '<img src="'.get_bloginfo('template_url').'/assets/images/search-icon-png-white.png'.'" class="search-icon" />';
	}
	else
	{
		return '<img src="'.get_bloginfo('template_url').'/assets/images/search-icon-png-green.png'.'" class="search-icon" />';
	}
}

function get_adventure_image($image) {
	return 'style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('.$image.') no-repeat center bottom; background-size: cover;"';
}


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

// Create custom post type(s)

function get_post_args($custom_post_type) {
	$labels = array(
		'name'                  => _x( $custom_post_type, 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( '', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( $custom_post_type, 'text_domain' ),
		'name_admin_bar'        => __( '', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);

	$args = array(
		'label'                 => __( '', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	return $args;
}

// Create custom Taxonomy(ies)

function get_tax_args($custom_tax) {
	$labels = array(
		'name'                       => _x( $custom_tax, 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( '', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( $custom_tax, 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	return $args;
}