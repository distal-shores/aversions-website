@extends('dashboard.index')

@section('right_pane')
	<h1>Venues</h1>
	<table class="table">
		<thead>
      <tr>
  			<th scope="col">Name</th>
  			<th scope="col">Email</th>
  			<th scope="col">Main Contact Name</th>
  			<th scope="col">City</th>
  			<th scope="col">Country</th>
  			<th scope="col">URL</th>
        <th scope="col">Edit/Delete</th>
    	</tr>
    </thead>
    <tbody>
		  @foreach ($venues as $venue)
        <tr>
  				<td>{{ $venue->name }}</td>
  				<td>{{ $venue->email }}</td>
  				<td>{{ $venue->main_contact }}</td>
          <td>{{ $venue->city }}</td>
          <td>{{ $venue->country }}</td>
  				<td>
            @isset($venue->website_url)
              <a href="{{ $venue->website_url }}">Click here</a>
            @endisset
          </td>
          <td>
            <a class="btn btn-sm btn-secondary" href="{{ route('venues.edit', ['venue' => $venue->id]) }}">Edit</a>
            <form action="{{ route('venues.destroy', $venue->id) }}" class="inline-form" enctype="multipart/form-data" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete the venue {{ $venue->name }}?')" type="submit">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection