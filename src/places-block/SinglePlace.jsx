export const SinglePlace = ({ place }) => {
	if (!place) {
		return null;
	}
	return (
		<div className="single-place">
			<p className="place-title">{place.title.rendered}</p>
			<p className="place-excerpt">{place.excerpt.raw}</p>
		</div>
	);
};
