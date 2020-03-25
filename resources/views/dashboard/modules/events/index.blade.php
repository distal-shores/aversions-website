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
        <th scope="col">Edit/Delete</th>
    	</tr>
    </thead>
    <tbody>
		  @foreach ($events as $event)
        <tr>
  				<th scope="row">{{ $event->date }}</th>
  				<td>{{ $event->name }}</td>
  				<td>{{ $event->venue->name }}</td>
  				<td>{{ date("g:i A", strtotime($event->start_time)) }}</td>
  				<td>
  					@foreach ($event->otherBands as $band)
              @if($band->website_url != (null || ''))
                <a href="{{ $band->website_url }}">{{ $band->name }}</a>{{ $loop->last ? '' : ',' }}
              @else
                {{ $band->name }}{{ $loop->last ? '' : ',' }}
              @endif
  					@endforeach
  				</td>
  				<td>
            @isset($event->event_url)
              <a href="{{ $event->event_url }}">Click here</a>
            @endisset
          </td>
          <td>
            <a class="btn btn-sm btn-secondary" href="{{ route('events.edit', ['event' => $event->id]) }}">Edit</a>
            <form action="{{ route('events.destroy', $event->id) }}" class="inline-form" enctype="multipart/form-data" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete the event {{ $event->name }}?')" type="submit">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection