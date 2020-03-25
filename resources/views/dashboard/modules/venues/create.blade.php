@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add a venue</h1>
	<form class="w-100" action="{{ action('VenuesController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="venue_name">Venue Name</label>
			<input type="text" class="form-control" id="venue_name" name="venue_name" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="venue_contact">Main Contact Name</label>
			<input type="text" class="form-control" id="venue_contact" name="venue_contact" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="venue_city">City</label>
					<input type="text" class="form-control" id="venue_city" name="venue_city" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="venue_country">Country</label>
					<select name="venue_country" id="venue_country" class="form-control" required>
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
					<label for="venue_url">Website URL</label>
					<input id="venue_url" class="form-control" name="venue_url">
				</div> {{-- /col --}}
				<div class="col">
					<label for="venue_email">Email</label>
					<input id="venue_email" class="form-control" name="venue_email">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
