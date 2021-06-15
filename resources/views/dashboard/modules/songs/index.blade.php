@extends('dashboard.index')

@section('right_pane')
	<h1>Songs</h1>
	<table class="table">
		<thead>
    	<tr>
  			<th scope="col">Release Date</th>
  			<th scope="col">Name</th>
  			<th scope="col">Album</th>
  			<th scope="col">Bandcamp Link</th>
            <th scope="col">Soundcloud Link</th>
            <th scope="col">EPK</th>
            <th scope="col">Single?</th>
            <th scope="col">Edit/Delete</th>
    	</tr>
  	</thead>
  	<tbody>
        @foreach ($songs as $song)
            <tr>
  			    <td>{{ $song->release_date }}</td>
  				<td>{{ $song->name }}</td>
  				<td>{{ $song->album }}</td>
                <td>
                    @isset($song->bandcamp_slug)
                        <a href="{{ env('BANDCAMP_BASE_URL') . 'track/' . $song->bandcamp_slug }}">Click here</a>
                    @endisset
                </td>
                <td>
                    @isset($song->soundcloud_slug)
                        <a href="{{ env('SOUNDCLOUD_BASE_URL') . $song->soundcloud_slug }}">Click here</a>
                    @endisset
                </td>
                <td>
                    @if($song->epk_published)
                        <a href="/track/{{ $song->slug }}/epk">Click here</a>
                    @endif
                </td>
                <td>
                    {{ $song->is_single ? 'X' : '' }}
                </td>
                <td>
                    <a href="{{ route('songs.edit', ['song' => $song->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form method="POST" action="{{ route('songs.destroy', $song->id) }}" class="inline-form" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirm('Are you sure you want to delete the song {{ $song->name }}?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
    		</tr>
		@endforeach
    </tbody>
  </table>
@endsection