@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add a press publication</h1>
	<form class="w-100" action="{{ action('PublicationsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Publication Name</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="contact_name">Main Contact Name</label>
					<input type="text" class="form-control" id="contact_name" name="contact_name">
				</div> {{-- /col --}}
				<div class="col">
					<label for="email">Email</label>
					<input type="email" id="email" class="form-control" name="email" required>
				</div> {{-- /col --}}
			</div> {{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city" name="city">
				</div> {{-- /col --}}
				<div class="col">
					<label for="country">Country</label>
					<select name="country" id="country" class="form-control">
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
				<div class="col-md-10">
					<label for="url">Website URL</label>
					<input id="url" class="form-control" name="url" required>
					<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
				<div class="col-md-2">
					<label for="print_only">Print Primary?</label>
					<input type="checkbox" id="print_only" class="form-control pull-left" name="print_only" value="0">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection