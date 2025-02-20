<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
if (! empty($attributes['placeId']) && is_numeric($attributes['placeId'])) {
	$place_id = $attributes['placeId'];
	$place = get_post($place_id);
	if (function_exists('get_field')) {
		$place_field = get_field('location', $place_id);
	}
	?>
	<div <?php echo get_block_wrapper_attributes(); ?>>
		<?php if (! empty($place) ) : ?>
			<h2><?php esc_html_e($place->post_title); ?></h2>
			<p><?php esc_html_e($place->post_excerpt); ?></p>
			<?php if (! empty($place_field)) : ?>
				<p><?php esc_html_e($place_field['address']); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php
}
