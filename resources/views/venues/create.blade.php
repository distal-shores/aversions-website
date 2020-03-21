@extends('layouts.app')

@section('content')
	<h1>Add a venue</h1>
	<form class="w-50" action="{{ action('EventsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="event_name">Event Name</label>
			<input type="text" class="form-control" id="event_name" name="name" size="10">
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="ticket_url">Ticket URL</label>
					<input type="text" class="form-control" id="ticket_url" name="ticket_url" size="10">
				</div> {{-- /col --}}
				<div class="col">
					<label for="event_url">Event URL</label>
					<input type="text" class="form-control" id="event_url" name="event_url" size="10">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="event_date">Event Date</label>
					<input id="event_date" class="form-control" name="event_date" size="10">
				</div> {{-- /col --}}
				<div class="col">
					<label for="start_time">Start Time</label>
					<input type="time" class="form-control" id="start_time" name="start_time" size="10">
				</div> {{-- /col --}}
				<div class="col">
					<label for="end_time">End Time</label>
					<input type="time" class="form-control" id="end_time" name="end_time" size="10">
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="ticket_price">Ticket Price</label>
			<input type="number" class="form-control" id="ticket_price" min="0.50" step="0.50" max="2500" value="0.00" />
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection
