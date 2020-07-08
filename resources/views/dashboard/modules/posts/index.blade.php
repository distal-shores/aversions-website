@extends('dashboard.index')

@section('right_pane')
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<h1>Posts</h1>
	<table class="table">
		<thead>
    	<tr>
  			<th scope="col">Date</th>
  			<th scope="col">Title</th>
        <th scope="col">Author</th>
  			<th scope="col">Slug</th>
        <th scope="col">Published?</th>
        <th scope="col">Edit/Delete</th>
    	</tr>
  	</thead>
  	<tbody>
		  @foreach ($posts as $post)
        <tr>
          <input class="post-id" type="hidden" data-postid="{{$post->id}}">
  				<td>{{ date('d M Y', $post->created_at->timestamp) }}</td>
  				<td>{{ $post->title }}</td>
          <td>{{ $post->user->name }}</td>
          <td>
            @isset($post->slug)
              <a href="/post/{{ $post->slug }}">/{{ $post->slug }}</a>
            @endisset
          </td>
          <td>
            <input class="published" type="checkbox" name="published" {{ $post->published ? 'checked' : '' }}>
          </td>
          <td>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline-form" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="confirm('Are you sure you want to delete the post {{ $post->title }}?')" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
    		</tr>
			@endforeach
    </tbody>
  </table>
@endsection

@push('scripts')
  <script src="{{ mix('js/published.js') }}"></script>
@endpush