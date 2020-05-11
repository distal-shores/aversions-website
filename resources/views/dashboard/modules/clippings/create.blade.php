@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add a clipping</h1>
	<form class="w-100" action="{{ action('ClippingsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Clipping Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="publication_id">Publication</label>
            <select name="publication_id" id="publication_id" class="form-control" required>
				<option value="">--- Select Publication ---</option>
				@foreach ($publications as $publication)
					<option value="{{ $publication->id }}">{{ $publication->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="pullquote">Pullquote</label>
			<input type="text" class="form-control" id="pullquote" name="pullquote" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="url">URL</label>
			<input type="text" class="form-control" id="url" name="url">
			<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
		</div> {{-- /form-group --}}
		<div class="form-group w-50">
			<label for="date">Publication Date</label>
			<input id="date" class="form-control" name="date" required>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
    <script src="/js/datepicker.js"></script>
@endpush
