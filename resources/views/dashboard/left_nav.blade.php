<nav id="dashboard-nav">
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
			<a href="{{ route('posts.index') }}">Posts</a>
			<a class="btn" href="{{ route('posts.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('events.index') }}">Events</a>
			<a class="btn" href="{{ route('events.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('bands.index') }}">Bands</a>
			<a class="btn" href="{{ route('bands.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('venues.index') }}">Venues</a>
			<a class="btn" href="{{ route('venues.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('publications.index') }}">Publications</a>
			<a class="btn" href="{{ route('publications.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('clippings.index') }}">Clippings</a>
			<a class="btn" href="{{ route('clippings.create') }}"><i class="fas fa-plus-square"></i></a>
		</li>
	</ul>
</nav>