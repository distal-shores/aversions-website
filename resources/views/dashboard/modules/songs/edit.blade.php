@extends('dashboard.index-forms')

@section('form-image')
	@if($song->cover_art)
		<h3>Current song art</h3>
		<img class="img-fluid" src="{{ asset('storage/song_covers/'.$song->cover_art) }}">
	@endif
@endsection

@section('right_pane')
	<h1>Edit song</h1>
    <h3>{{ $song->name }}</h3>
	<form class="w-100" action="{{ route('songs.update', $song->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="name">Song Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $song->name }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="name">Slug</label>
			<input type="text" class="form-control" id="slug" name="slug" value="{{ $song->slug }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="release_date">Release Date</label>
			<input type="date" class="form-control" id="release_date" name="release_date" value="{{ $song->release_date }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="bandcamp_slug">Bandcamp Slug</label>
					<input type="text" class="form-control" id="bandcamp_slug" name="bandcamp_slug" value="{{ $song->bandcamp_slug }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="youtube_slug">Youtube Slug</label>
					<input type="text" class="form-control" id="youtube_slug" name="youtube_slug" value="{{ $song->youtube_slug }}">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="soundcloud_slug">Soundcloud Slug</label>
                    <input type="text" class="form-control" id="soundcloud_slug" name="soundcloud_slug" value="{{ $song->soundcloud_slug }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="soundcloud_param">Soundcloud Param</label>
                    <input type="text" class="form-control" id="soundcloud_param" name="soundcloud_param" value="{{ $song->soundcloud_param }}">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="mp3">Mp3 Upload</label>
                    <input type="file" id="mp3" name="mp3">
				</div> {{-- /col --}}
				<div class="col">
					<label for="wav">WAV Upload</label>
					<input type="file" id="wav" name="wav">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
        <div class="form-group">
			<label for="description">Description</label>
			<textarea rows="8" class="form-control" id="description" name="description" required>{{ $song->description }}</textarea>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="cover_art">Change Cover Art</label>
			<input type="file" class="form-control" id="cover_art"  name="cover_art">
			@if(isset($song->cover_art))
				<div class="form-instruction"><em>Currently set poster is named {{ $song->cover_art }}</em></div>
			@endif
		</div> {{-- /form-group --}}
		<div class="form-group">
            <div class="form-row">
				<div class="col">
			        <label for="is_single">Single?</label>
			        <input type="checkbox" id="is_single" class="form-control pull-left" name="is_single" {{ $song->is_single == true ? 'checked' : ''}}>
                </div> {{-- /col --}}
                <div class="col">
                    <label for="is_single">EPK Published?</label>
                    <input type="checkbox" id="epk_published" class="form-control pull-left" name="epk_published" {{ $song->epk_published == true ? 'checked' : ''}}>
                </div> {{-- /col --}}
            </div> {{-- /form-row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection