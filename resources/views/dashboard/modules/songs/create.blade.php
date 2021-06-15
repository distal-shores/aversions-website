@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add a song</h1>
	<form class="w-100" action="{{ action('SongsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Song Name</label>
			<input type="text" class="form-control" id="name" name="name" required>
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
					<label for="soundcloud_slug">Soundcloud Slug</label>
                    <input type="text" class="form-control" id="soundcloud_slug" name="soundcloud_slug">
				</div> {{-- /col --}}
				<div class="col">
					<label for="soundcloud_param">Soundcloud Param</label>
                    <input type="text" class="form-control" id="soundcloud_param" name="soundcloud_param">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="is_single">Single?</label>
			<input type="checkbox" id="is_single" class="form-control pull-left" name="is_single" value="0">
		</div> {{-- /form-group --}}
        <div class="form-group">
			<label for="description">Description</label>
			<textarea rows="4" class="form-control" id="description" name="description"></textarea>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection