@extends('dashboard.index-forms')

@section('form-image')
	@if($event->event_poster)
		<h3>Current poster</h3>
		<img class="img-fluid" src="{{ asset('posters/'.$event->event_poster) }}">
	@endif
@endsection

@section('right_pane')
	<h1>Edit event</h1>
	<h3>{{ $event->name }}</h3>
	
	<form class="w-100" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="event_name">Event Name</label>
			<input type="text" class="form-control" id="event_name" name="name" value="{{ $event->name }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_venue">Venue</label>
            <select name="event_venue" id="event_venue" class="form-control" required>
				<option value="">--- Select Venue ---</option>
				@foreach ($venues as $venue)
					<option value="{{ $venue->id }}" {{ $venue->id === $eventVenue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_bands">Other Acts</label>
            <select name="event_bands[]" id="event_bands" class="form-control" multiple>
				@foreach ($bands as $band)
					<option value="{{ $band->id }}" {{ in_array($band->id, $event->bands()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $band->name }}</option>
				@endforeach
			</select>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="ticket_url">Ticket URL</label>
					<input type="text" class="form-control" value="{{ isset($event->ticket_url) ? $event->ticket_url : ''  }}" id="ticket_url" name="ticket_url">
					<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
				<div class="col">
					<label for="event_url">Event URL</label>
					<input type="text" class="form-control" value="{{ isset($event->event_url) ? $event->event_url : ''  }}" id="event_url" name="event_url">
					<div class="form-instruction" for="ticket_url"><em>Valid URL including http:// or https://</em></div>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="event_date">Event Date</label>
					<input id="event_date" class="form-control" value="{{ $event->date }}" name="event_date" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="start_time">Start Time</label>
					<input type="time" class="form-control" value="{{ $event->start_time }}" id="start_time" name="start_time" required>
				</div> {{-- /col --}}
				<div class="col">
					<label for="end_time">End Time</label>
					<input type="time" class="form-control" value="{{ $event->end_time }}" id="end_time" name="end_time" required>
				</div> {{-- /col --}}
			</div>	{{-- /row --}}
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="ticket_price">Ticket Price</label>
			<input type="number" class="form-control" id="ticket_price" min="0.50" step="0.50" max="2500" name="ticket_price" value="{{ $event->ticket_price }}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="event_poster">Change Poster</label>
			<input type="file" class="form-control" id="event_poster"  name="event_poster">
			@if(isset($event->event_poster))
				<div class="form-instruction"><em>Currently set poster is named {{ $event->event_poster }}</em></div>
			@endif
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
    <script src="/js/datepicker.js"></script>
@endpush