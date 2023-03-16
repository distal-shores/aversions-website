@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add an album</h1>
	<form class="w-100" action="{{ action('AlbumController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Album Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="release_date">Release Date</label>
			<input type="date" value="{{ date("Y/m/d") }}" class="form-control" id="release_date" name="release_date" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="bandcamp_slug">Bandcamp Slug</label>
					<input type="text" class="form-control" id="bandcamp_slug" name="bandcamp_slug">
				</div> {{-- /col --}}
				<div class="col">
					<label for="spotify_slug">Spotify Slug</label>
					<input type="text" class="form-control" id="spotify_slug" name="spotify_slug">
				</div> {{-- /col --}}
			</div>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="cover_art">Cover Art</label>
			<input type="file" class="form-control" id="cover_art"  name="cover_art">
		</div> {{-- /form-group --}}
        <div class="form-group">
			<label for="description">Description</label>
			<textarea rows="4" class="form-control" id="description" name="description"></textarea>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection