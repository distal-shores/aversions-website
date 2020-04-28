@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit venue</h1>
	<h3>{{ $venue->name }}</h3>
	<form action="{{ route('venues.update', $venue->id) }}" class="w-100" enctype="multipart/form-data" method="POST">
		@csrf
		@method('PATCH')
		
		<div class="form-group">
			<label for="name">Venue Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="main_contact">Main Contact Name</label>
			<input type="text" class="form-control" id="main_contact" name="main_contact" value="{{ $venue->main_contact }}">
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" value="{{ $venue->address }}" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city" name="city" value="{{ $venue->city }}" required>
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
							<option value="{{ $country->name->common }}" {{ $venue->country === $country->name->common ? 'selected' : '' }}>{{ $country->name->common }}</option>
							}
						@endforeach
					</select>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<input type="hidden" id="hiddenState" name="hiddenState" value="{{$venue->state}}">
					<label for="state">State/Province</label>
					<select name="state" id="state" class="form-control" disabled required>
						<option class="default" value="">--- Select state ---</option>
					</select>
				</div> {{-- /col --}}
				<div class="col-md-4">
					<label for="postal_code">Postal Code</label>
					<input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $venue->postal_code }}" required>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="website_url">Website URL</label>
					<input id="website_url" class="form-control" name="website_url" value="{{ $venue->website_url }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="email">Email</label>
					<input id="email" class="form-control" name="email" value="{{ $venue->email }}">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
	<script src="{{ mix('js/getStates.js') }}"></script>
@endpush