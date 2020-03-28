@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit band</h1>
	<h3>{{ $band->name }}</h3>

	<form action="{{ route('bands.update', $band->id) }}" class="w-100" enctype="multipart/form-data" method="POST">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="band_name">Band Name</label>
			<input type="text" class="form-control" id="band_name" name="band_name" value="{{ $band->name }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_city">City</label>
					<input type="text" class="form-control" id="band_city" name="band_city" value="{{ $band->city }}" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="band_country">Country</label>
					<select name="band_country" id="band_country" class="form-control" required>
						<option value="">--- Select Country ---</option>
						@foreach($countries as $country)
							<option value="{{ $country->name->common }}" {{ $band->country === $country->name->common ? 'selected' : '' }}>{{ $country->name->common }}</option>
						@endforeach
					</select>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="band_url">Website URL</label>
					<input id="band_url" class="form-control" name="band_url" value="{{ $band->website_url }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="band_email">Email</label>
					<input id="band_email" class="form-control" name="band_email" value="{{ $band->email }}">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
