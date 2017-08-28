<?php
/**
 *
 * @package   Inhabitent Functionality
 * @author    Cody Collicott <cody.collicott@redacademy.com>
 * @license   GPL-2.0+
 * @copyright 2017 RED Academy
 *
 * @wordpress-plugin
 * Plugin Name: Inhabitent Functionality
 * Description: This plugin registers all CPT and taxonomies for the site to use.
 * Version:     1.0.0
 * Author:      Cody Collicott
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define plugin directory
 *
 * @since 1.0.0
 */
define( 'RF_DIR', dirname( __FILE__ ) );

/**
 * General housekeeping and plugin activation tasks
 *
 * @since 1.0.0
 */

/**
 * Post types
 *
 * @since 1.0.0
 */
include_once( RF_DIR . '/lib/functions/post-types.php' );

/**
 * Taxonomies
 *
 * @since 1.0.0
 */
include_once( RF_DIR . '/lib/functions/taxonomies.php' );
