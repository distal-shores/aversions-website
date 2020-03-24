<nav>
	<ul class="list-group list-group-flush">
		<li class="list-group-item list-group-item-dark">Events</li>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a href="{{ route('events.index') }}">List Events</a>
			</li>
			<li class="list-group-item">
				<a href="{{ route('events.create') }}">Create Event</a>
			</li>
		</ul>
		<li class="list-group-item list-group-item-dark">Bands</li>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a href="{{ route('bands.index') }}">List Bands</a>
			</li>
			<li class="list-group-item">	
				<a href="{{ route('bands.create') }}">Create Band</a>
			</li>
		</ul>
		<li class="list-group-item list-group-item-dark">Venues</li>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a href="{{ route('venues.index') }}">List Venues</a>
			</li>
			<li class="list-group-item">	
				<a href="{{ route('venues.create') }}">Create Venue</a>
			</li>
		</ul>
	</ul>
</nav>