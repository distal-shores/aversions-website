@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit press publication</h1>
	<h3>{{ $publication->name }}</h3>

	<form class="w-100" action="{{ route('publications.update', $publication->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')

		<div class="form-group">
			<label for="name">Publication Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $publication->name }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="contact_name">Main Contact Name</label>
					<input type="text" class="form-control" id="contact_name" value="{{ $publication->contact_name }}" name="contact_name">
				</div> {{-- /col --}}
				<div class="col">
					<label for="email">Email</label>
					<input type="email" id="email" class="form-control" name="email" value="{{ $publication->email }}" required>
				</div> {{-- /col --}}
			</div> {{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city" name="city" value="{{ $publication->city }}">
				</div> {{-- /col --}}
				<div class="col">
					<label for="country">Country</label>
					<select name="country" id="country" class="form-control">
						<option value="">--- Select Country ---</option>
						@foreach($countries as $country)
							<option value="{{ $country->name->common }}" {{ $publication->country === $country->name->common ? 'selected' : '' }}>{{ $country->name->common }}</option>
						@endforeach
					</select>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-10">
					<label for="url">Website URL</label>
					<input id="url" class="form-control" name="url" value="{{ $publication->url }}" required>
					<div class="form-instruction" for="url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
				<div class="col-md-2">
					<label for="print_only">Print Only?</label>
					<input type="checkbox" id="print_only" class="form-control pull-left" name="print_only" {{ $publication->print_only == 1 ? 'checked' : ''}}>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection