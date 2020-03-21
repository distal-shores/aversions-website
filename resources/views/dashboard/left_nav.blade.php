<nav>
	<ul>
		<li>Events</li>
		<ul>
			<li>
				<a href="{{ route('events.index') }}">List Events</a>
			</li>
			<li>
				<a href="{{ route('events.create') }}">Create Event</a>
			</li>
		</ul>
		<li>Bands</li>
		<ul>
			<li>
				<a href="{{ route('bands.index') }}">List Bands</a>
			</li>
			<li>	
				<a href="{{ route('bands.create') }}">Create Band</a>
			</li>
		</ul>
		<li>Venues</li>
		<ul>
			<li>
				<a href="{{ route('venues.index') }}">List Venues</a>
			</li>
			<li>	
				<a href="{{ route('venues.create') }}">Create Venue</a>
			</li>
		</ul>
	</ul>
</nav>