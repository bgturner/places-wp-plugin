<?php

add_action('rest_api_init', function () {
	register_rest_route('places/v1', '/places', array(
		'methods' => 'GET',
		'callback' => 'get_places',
		'permission_callback' => '__return-true',
	));
});

function get_places() {
	$args = array(
		'post_type' => 'place',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	$places = get_posts($args);
	$places = array_map(function ($place) {
		return [
			'id' => $place->ID,
			'title' => $place->post_title,
			'description' => $place->post_excerpt,
			'acf' => get_fields($place->ID),
		];
	}, $places);
	return $places;
}
