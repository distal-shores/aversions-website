@extends('dashboard.index')

@section('right_pane')
	<h1>Bands</h1>
	<table class="table">
		<thead>
    	<tr>
  			<th scope="col">Name</th>
  			<th scope="col">Email</th>
  			<th scope="col">City</th>
  			<th scope="col">Country</th>
  			<th scope="col">URL</th>
        <th scope="col">Edit/Delete</th>
    	</tr>
  	</thead>
  	<tbody>
		  @foreach ($bands as $band)
        <tr>
  				<td>{{ $band->name }}</td>
  				<td>{{ $band->email }}</td>
  				<td>{{ $band->city }}</td>
          <td>{{ $band->country }}</td>
          <td>
            @isset($band->website_url)
              <a href="{{ $band->url }}">Click here</a>
            @endisset
          </td>
          <td>
            <a href="{{ route('bands.edit', ['band' => $band->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form method="POST" action="{{ route('bands.destroy', $band->id) }}" class="inline-form" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="confirm('Are you sure you want to delete the band {{ $band->name }}?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection