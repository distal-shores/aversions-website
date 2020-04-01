@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add a venue</h1>
	<form class="w-100" action="{{ action('VenuesController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-8">
					<label for="name">Venue Name</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<label for="main_contact">Main Contact Name</label>
					<input type="text" class="form-control" id="main_contact" name="main_contact" required>
				</div> {{-- /col --}}
			</div> {{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-8">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" required>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city" name="city" required>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-4">
					<label for="country">Country</label>
					<select name="country" id="country" class="form-control" required>
						<option value="">--- Select Country ---</option>
						@foreach($countries as $country)
							<option value="{{ $country->name->common }}">{{ $country->name->common }}</option>
							}
						@endforeach
					</select>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<label for="state">State/Province</label>
					<select name="state" id="state" class="form-control" disabled required>
						<option class="default" value="">--- Select state ---</option>
					</select>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<label for="postal_code">Postal Code</label>
					<input type="text" name="postal_code" id="postal_code" class="form-control" required>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="phone_number">Phone Number</label>
					<input type="tel" id="phone_number" class="form-control" name="phone_number">
				</div> {{-- /col --}}
				<div class="col">
					<label for="email">Email</label>
					<input id="email" class="form-control" name="email" type="email">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">		
			<label for="website_url">Website URL</label>
			<input id="website_url" class="form-control" name="website_url">
			<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
	<script src="{{ mix('js/getStates.js') }}"></script>
@endpush