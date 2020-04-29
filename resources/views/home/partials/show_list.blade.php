<div class="show-list">
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
				@foreach($futureEvents as $event)
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
</div>

<script src="/js/showList.js"></script>


