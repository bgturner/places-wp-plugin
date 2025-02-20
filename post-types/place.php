<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the `place` post type.
 */
function place_init() {
	register_post_type(
		'place',
		[
			'labels'                => [
				'name'                  => __( 'Places', 'places' ),
				'singular_name'         => __( 'Place', 'places' ),
				'all_items'             => __( 'All Places', 'places' ),
				'archives'              => __( 'Place Archives', 'places' ),
				'attributes'            => __( 'Place Attributes', 'places' ),
				'insert_into_item'      => __( 'Insert into place', 'places' ),
				'uploaded_to_this_item' => __( 'Uploaded to this place', 'places' ),
				'featured_image'        => _x( 'Featured Image', 'place', 'places' ),
				'set_featured_image'    => _x( 'Set featured image', 'place', 'places' ),
				'remove_featured_image' => _x( 'Remove featured image', 'place', 'places' ),
				'use_featured_image'    => _x( 'Use as featured image', 'place', 'places' ),
				'filter_items_list'     => __( 'Filter places list', 'places' ),
				'items_list_navigation' => __( 'Places list navigation', 'places' ),
				'items_list'            => __( 'Places list', 'places' ),
				'new_item'              => __( 'New Place', 'places' ),
				'add_new'               => __( 'Add New', 'places' ),
				'add_new_item'          => __( 'Add New Place', 'places' ),
				'edit_item'             => __( 'Edit Place', 'places' ),
				'view_item'             => __( 'View Place', 'places' ),
				'view_items'            => __( 'View Places', 'places' ),
				'search_items'          => __( 'Search places', 'places' ),
				'not_found'             => __( 'No places found', 'places' ),
				'not_found_in_trash'    => __( 'No places found in trash', 'places' ),
				'parent_item_colon'     => __( 'Parent Place:', 'places' ),
				'menu_name'             => __( 'Places', 'places' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'excerpt' ],
			'has_archive'           => false,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'place',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'place_init' );

/**
 * Sets the post updated messages for the `place` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `place` post type.
 */
function place_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['place'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Place updated. <a target="_blank" href="%s">View place</a>', 'places' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'places' ),
		3  => __( 'Custom field deleted.', 'places' ),
		4  => __( 'Place updated.', 'places' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Place restored to revision from %s', 'places' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Place published. <a href="%s">View place</a>', 'places' ), esc_url( $permalink ) ),
		7  => __( 'Place saved.', 'places' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Place submitted. <a target="_blank" href="%s">Preview place</a>', 'places' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Place scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview place</a>', 'places' ), date_i18n( __( 'M j, Y @ G:i', 'places' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Place draft updated. <a target="_blank" href="%s">Preview place</a>', 'places' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'place_updated_messages' );

/**
 * Sets the bulk post updated messages for the `place` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `place` post type.
 */
function place_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['place'] = [
		/* translators: %s: Number of places. */
		'updated'   => _n( '%s place updated.', '%s places updated.', $bulk_counts['updated'], 'places' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 place not updated, somebody is editing it.', 'places' ) :
						/* translators: %s: Number of places. */
						_n( '%s place not updated, somebody is editing it.', '%s places not updated, somebody is editing them.', $bulk_counts['locked'], 'places' ),
		/* translators: %s: Number of places. */
		'deleted'   => _n( '%s place permanently deleted.', '%s places permanently deleted.', $bulk_counts['deleted'], 'places' ),
		/* translators: %s: Number of places. */
		'trashed'   => _n( '%s place moved to the Trash.', '%s places moved to the Trash.', $bulk_counts['trashed'], 'places' ),
		/* translators: %s: Number of places. */
		'untrashed' => _n( '%s place restored from the Trash.', '%s places restored from the Trash.', $bulk_counts['untrashed'], 'places' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'place_bulk_updated_messages', 10, 2 );

add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_67b262127e1ea',
		'title' => 'Places',
		'fields' => array(
			array(
				'key' => 'field_67b2621295c99',
				'label' => 'location',
				'name' => 'location',
				'aria-label' => '',
				'type' => 'google_map',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
				'allow_in_bindings' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'place',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	) );
} );
