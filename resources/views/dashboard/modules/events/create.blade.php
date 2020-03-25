@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Add an event</h1>
	<form class="w-100" action="{{ action('EventsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="event_name">Event Name</label>
			<input type="text" class="form-control" id="event_name" name="name" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_venue">Venue</label>
            <select name="event_venue" id="event_venue" class="form-control" required>
				<option value="">--- Select Venue ---</option>
				@foreach ($venues as $venue)
					<option value="{{ $venue->id }}">{{ $venue->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_bands">Other Acts</label>
            <select name="event_bands[]" id="event_bands" class="form-control" multiple>
				@foreach ($bands as $band)
					<option value="{{ $band->id }}">{{ $band->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="ticket_url">Ticket URL</label>
					<input type="text" class="form-control" id="ticket_url" name="ticket_url">
					<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
				<div class="col">
					<label for="event_url">Event URL</label>
					<input type="text" class="form-control" id="event_url" name="event_url">
					<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="event_date">Event Date</label>
					<input id="event_date" class="form-control" name="event_date" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="start_time">Start Time</label>
					<input type="time" class="form-control" id="start_time" name="start_time" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="end_time">End Time</label>
					<input type="time" class="form-control" id="end_time" name="end_time" required>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="ticket_price">Ticket Price</label>
			<input type="number" class="form-control" id="ticket_price" min="0.50" step="0.50" max="2500" value="0.00" name="ticket_price" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_poster">Poster</label>
			<input type="file" class="form-control" id="event_poster"  name="event_poster">
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection
