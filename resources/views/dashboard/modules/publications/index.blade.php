@extends('dashboard.index')

@section('right_pane')
	<h1>Press Publications</h1>
	<table class="table">
		<thead>
    	<tr>
  			<th scope="col">Name</th>
  			<th scope="col">Email</th>
  			<th scope="col">Main Contact</th>
  			<th scope="col">City</th>
        <th scope="col">Country</th>
  			<th scope="col">URL</th>
        <th scope="col">Print Only?</th>
        <th scope="col">Edit/Delete</th>
    	</tr>
  	</thead>
  	<tbody>
		  @foreach ($pubs as $pub)
        <tr>
  				<td>{{ $pub->name }}</td>
  				<td>{{ $pub->email }}</td>
  				<td>{{ $pub->contact_name }}</td>
          <td>{{ $pub->city }}</td>
          <td>{{ $pub->country }}</td>
          <td>
            @isset($pub->url)
              <a href="{{ $pub->url }}">Click here</a>
            @endisset
          </td>
          <td>
            {{ $pub->print_only ? 'X' : '' }}
          </td>
          <td>
            <a href="{{ route('publications.edit', ['publication' => $pub->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form method="POST" action="{{ route('publications.destroy', $pub->id) }}" class="inline-form" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="confirm('Are you sure you want to delete the publication {{ $pub->name }}?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection