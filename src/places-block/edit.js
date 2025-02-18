/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { ComboboxControl, PanelBody } from '@wordpress/components';
import { useEntityRecords } from '@wordpress/core-data';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
import { PlacesList } from './PlacesList';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit() {

	const data = useEntityRecords( 'postType', 'place' );

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<ComboboxControl
						label="Select Places to display"
						onChange={() => console.log('Changed places...')}
						onFilterValueChange={() => console.log('Filter value changed...')}
						value={null}
						options={[
							{ label: '1', value: 'Place Title 1' },
							{ label: '2', value: 'Place Title 2' },
							{ label: '3', value: 'Place Title 3' },
							{ label: '4', value: 'Place Title 4' },
						]}
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				{data.hasResolved
					&& <div>
						   <PlacesList places={data.records} />
					   </div>
				}
			</div>
		</>
	);
}
