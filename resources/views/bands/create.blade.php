@extends('dashboard.index')

@section('right_pane')
	<h1>Add a band</h1>
	<form class="w-50" action="{{ action('BandsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="band_name">Band Name</label>
			<input type="text" class="form-control" id="band_name" name="band_name" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_city">City</label>
					<input type="text" class="form-control" id="band_city" name="band_city" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="band_country">Country</label>
					<select name="band_country" id="band_country" class="form-control" required>
						<option value="">--- Select Country ---</option>
						@foreach($countries as $country)
							<option value="{{ $country->name->common }}">{{ $country->name->common }}</option>
						@endforeach
					</select>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_url">Website URL</label>
					<input id="band_url" class="form-control" name="band_url">
				</div> {{-- /col --}}
				<div class="col">
					<label for="band_email">Email</label>
					<input id="band_email" class="form-control" name="band_email">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
