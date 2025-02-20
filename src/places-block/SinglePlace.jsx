export const SinglePlace = ({ place }) => {
	if (!place) {
		return null;
	}
	return (
		<div className="single-place">
			<h3 className="place-title">
				<span className="place-id">{place.id}</span>
				&nbsp;
				<span class="title">{place.title.rendered}</span>
			</h3>
			<p className="place-excerpt">{place.excerpt.raw}</p>
		</div>
	);
};
