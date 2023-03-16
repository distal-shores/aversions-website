@extends('dashboard.index-forms')

@section('form-image')
	@if($album->cover_art)
		<h3>Current album art</h3>
		<img class="img-fluid" src="{{ asset('storage/album_covers/'.$song->cover_art) }}">
	@endif
@endsection

@section('right_pane')
	<h1>Edit album</h1>
    <h3>{{ $album->title }}</h3>
	<form class="w-100" action="{{ route('albums.update', $album->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="name">Album Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $album->title }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="name">Slug</label>
			<input type="text" class="form-control" id="slug" name="slug" value="{{ $album->slug }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="release_date">Release Date</label>
			<input type="date" class="form-control" id="release_date" name="release_date" value="{{ $album->release_date }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="bandcamp_slug">Bandcamp Slug</label>
					<input type="text" class="form-control" id="bandcamp_slug" name="bandcamp_slug" value="{{ $album->bandcamp_slug }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="spotify_slug">Spotify Slug</label>
					<input type="text" class="form-control" id="spotify_slug" name="spotify_slug" value="{{ $album->spotify_slug }}">
				</div> {{-- /col --}}
			</div>
		</div> {{-- /form-group --}}
        <div class="form-group">
			<label for="description">Description</label>
			<textarea rows="8" class="form-control" id="description" name="description" required>{{ $album->description }}</textarea>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="cover_art">Change Cover Art</label>
			<input type="file" class="form-control" id="cover_art"  name="cover_art">
			@if(isset($album->cover_art))
				<div class="form-instruction"><em>Currently set cover is named {{ $album->cover_art }}</em></div>
			@endif
		</div> {{-- /form-group --}}
		<div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="is_single">EPK Published?</label>
                    <input type="checkbox" id="published" class="form-control pull-left" name="published" {{ $album->published == true ? 'checked' : ''}}>
                </div> {{-- /col --}}
            </div> {{-- /form-row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection