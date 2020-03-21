@extends('layouts.app')

@section('content')
	<h1>Add a band</h1>
	<form class="w-50" action="{{ action('BandsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="band_name">Band Name</label>
			<input type="text" class="form-control" id="band_name" name="band_name">
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_city">City</label>
					<input type="text" class="form-control" id="band_city" name="band_city">
				</div> {{-- /col --}}
				<div class="col">
					<label for="band_country">Country</label>
					<input type="text" class="form-control" id="band_country" name="band_country">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_url">Website URL</label>
					<input id="band_url" class="form-control" name="band_url">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
