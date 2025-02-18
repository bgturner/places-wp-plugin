export function PlacesList({ places }) {
	if (!places?.length)
		return <div>No places to display</div>;

	return (
		<ul>
			{places?.map(place => (
				<li key={place.id}>
					{place.title.rendered}
				</li>
			))}
		</ul>
	);
}
