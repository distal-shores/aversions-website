@extends('dashboard.index')

@section('right_pane')
	<h1>Events</h1>
	<table class="table">
		<thead>
    		<tr>
      			<th scope="col">Date</th>
      			<th scope="col">Event</th>
      			<th scope="col">Venue</th>
      			<th scope="col">Doors</th>
      			<th scope="col">With</th>
      			<th scope="col">URL</th>
    		</tr>
  		</thead>
  		<tbody>
			@foreach ($events as $event)
				<tr>
      				<th scope="row">{{ $event->date }}</th>
      				<td>{{ $event->name }}</td>
      				<td>{{ $event->venue->name }}</td>
      				<td>{{ $event->start_time }}</td>
      				<td>
      					@foreach ($event->otherBands as $band)
      						{{ $band->name }}
      					@endforeach
      				</td>
      				<td>{{ $event->event_url }}</td>
    			</tr>
			@endforeach
@endsection