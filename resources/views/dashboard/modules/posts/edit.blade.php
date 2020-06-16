@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit post #{{$post->id}}</h1>
	<form class="w-100" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="content">Content</label>
			<textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="published">Published</label>
			<input type="checkbox" class="form-control" id="published" name="published" value="1" {{ $post->published ? 'checked' : '' }}>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
	<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
	<script>
	    tinymce.init({
	        selector:'textarea#content',
	        plugins: "link image",
	        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	        image_title: true,
	        automatic_uploads: true,
	        images_upload_url: '/upload',
	        images_upload_base_path: 'https://aversions-website.localhost/',
	        file_picker_types: 'image',
	        height: 600
	    });
	</script>
@endpush
