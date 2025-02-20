export const SinglePlace = ({ place }) => {
	if (!place) {
		return null;
	}
	return (
		<div className="single-place">
			<p className="place-title">{place.title.rendered}</p>
			<p className="place-excerpt">{place.excerpt.raw}</p>
			<p className="place-address">{place.acf.location.address}</p>
		</div>
	);
};
