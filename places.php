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

require_once(__DIR__ . '/verify-google-maps-api.php');
require_once(__DIR__ . '/post-types/place.php');
require_once(__DIR__ . '/rest-endpoints/places.php');
?>
