<?php
/**
 * Plugin Name:     Places
 * Description:     Organizes media and locations for 'places' CPT.
 * Author:          Benjamin Turner
 * Author URI:      https://passionsplay.com
 * Text Domain:     places
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Places
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once(__DIR__ . '/verify-google-maps-api.php');
require_once(__DIR__ . '/post-types/place.php');
require_once(__DIR__ . '/rest-endpoints/places.php');

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function pp_places_register_places_block_init() {
	register_block_type( __DIR__ . '/build/places-block' );
}
add_action( 'init', 'pp_places_register_places_block_init' );

?>
