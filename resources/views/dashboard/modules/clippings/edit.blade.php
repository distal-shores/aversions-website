@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit clipping</h1>
	<h3>{{ $clipping->title }} by {{ $clipping->publication->name }}</h3>
	<form class="w-100" action="{{ route('clippings.update', $clipping->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="title">Clipping Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $clipping->title }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="publication_id">Publication</label>
            <select name="publication_id" id="publication_id" class="form-control" required>
				<option value="">--- Select Publication ---</option>
				@foreach ($publications as $publication)
					<option value="{{ $publication->id }}" {{$clipping->publication->name == $publication->name ? 'selected' : ''}}>{{ $publication->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="url">URL</label>
			<input type="text" class="form-control" id="url" name="url" value="{{ $clipping->url }}">
			<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
		</div> {{-- /form-group --}}
		<div class="form-group w-25">
			<label for="date">Publication Date</label>
			<input id="date" class="form-control" name="date" value="{{ $clipping->publish_date }}" required>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
