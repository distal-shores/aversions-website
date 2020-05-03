<section class="show-list">
	<h2>Live</h2>
	<div id="show-list_selector">
		<span class="upcoming selected">Upcoming</span>
		<span class="past">Past</span>
	</div>
	<div id="show-list_upcoming">
		<table>
			<thead>
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Venue</th>
					<th scope="col">City</th>
					<th scope="col">Country</th>
				</tr>
			</thead>
			<tbody>
				@forelse($futureEvents as $event)
					<tr>
						<td>{{ $event->date }}</td>
						<td>{{ $event->venue->name }}</td>
						<td>{{ $event->venue->city }}</td>
						<td>{{ $event->venue->country }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="4" class="no-upcoming-shows">No upcoming shows!</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div id="show-list_past" class="hidden">
		<table>
			<thead>
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Venue</th>
					<th scope="col">City</th>
					<th scope="col">Country</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pastEvents as $event)
					<tr>
						<td>{{ $event->date }}</td>
						<td>{{ $event->venue->name }}</td>
						<td>{{ $event->venue->city }}</td>
						<td>{{ $event->venue->country }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@include('home.partials.divider')

<script src="/js/showList.js"></script>


