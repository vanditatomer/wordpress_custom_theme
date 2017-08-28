<?php
/**
 * The header for our theme.
 *
 * @package RED_Starter_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- .site-branding -->

				<div <?php echo get_banner_image(); ?> >
					<div class="flex flex-justify-between">
						<div class="banner-home">
							<a href="<?php echo get_home_url(); ?>">
							<?php echo get_banner_home(); ?>
							</a>
						</div>
						<div class="flex flex-column flex-justify-center flex-items-center banner-logo">
							<?php echo get_banner_logo(); ?>
						</div>
						<div class="flex banner-menu">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html( 'Primary Menu' ); ?></button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</nav><!-- #site-navigation -->
							<div class="search-toggle">
								<?php echo get_search_icon(); ?>
							</div>
						</div>
					</div>
				</div>

			</header><!-- #masthead -->

			<div id="content" class="site-content">
