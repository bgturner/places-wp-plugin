<?php

if (!getenv('GOOGLE_MAPS_API_KEY') && file_exists(__DIR__ . '/.env')) {
	$env = parse_ini_file('.env');
	putenv("GOOGLE_MAPS_API_KEY=" . $env["GOOGLE_MAPS_API_KEY"]);
}

if (!getenv('GOOGLE_MAPS_API_KEY')) {
	error_log('Places plugin requires GOOGLE_MAPS_API_KEY environment variable in order to set the location of a place.');
} else {
	add_filter('acf/fields/google_map/api', function ($api) {
		$api['key'] = getenv('GOOGLE_MAPS_API_KEY');
		return $api;
	});
}
