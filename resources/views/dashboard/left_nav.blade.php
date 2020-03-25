<nav id="dashboard-nav">
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
			<a href="{{ route('events.index') }}">Events</a>
			<a class="btn btn-small btn-success" href="{{ route('events.create') }}">Add New</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('bands.index') }}">Bands</a>
			<a class="btn btn-small btn-success" href="{{ route('bands.create') }}">Add New</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('venues.index') }}">Venues</a>
			<a class="btn btn-small btn-success" href="{{ route('venues.create') }}">Add New</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('publications.index') }}">Publications</a>
			<a class="btn btn-small btn-success" href="{{ route('publications.create') }}">Add New</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('clippings.index') }}">Clippings</a>
			<a class="btn btn-small btn-success" href="{{ route('clippings.create') }}">Add New</a>
		</li>
	</ul>
</nav>