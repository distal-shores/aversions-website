@extends('dashboard.index')

@section('right_pane')
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<h1>Clippings</h1>
	<table class="table">
		<thead>
    	<tr>
  			<th scope="col">Title</th>
  			<th scope="col">Publication</th>
  			<th scope="col">URL</th>
  			<th scope="col">Publish Date</th>
        <th scope="col">In Carousel?</th>
    	</tr>
  	</thead>
  	<tbody>
		  @foreach ($clippings as $clipping)
        <tr>
          <input class="clipping-id" type="hidden" data-clipid="{{$clipping->id}}">
  				<td>{{ $clipping->title }}</td>
  				<td>{{ $clipping->publication->name }}</td>
          <td>
            @isset($clipping->url)
              <a href="{{ $clipping->url }}">Click here</a>
            @endisset
          </td>
          <td>
            {{ $clipping->publish_date }}
          </td>
          <td>
            <input class="in_carousel" type="checkbox" name="in_carousel" {{ $clipping->in_carousel ? 'checked' : '' }}>
          </td>
          <td>
            <a href="{{ route('clippings.edit', ['clipping' => $clipping->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form method="POST" action="{{ route('clippings.destroy', $clipping->id) }}" class="inline-form" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="confirm('Are you sure you want to delete the clipping {{ $clipping->name }}?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection

@push('scripts')
  <script src="{{ mix('js/inCarousel.js') }}"></script>
@endpush