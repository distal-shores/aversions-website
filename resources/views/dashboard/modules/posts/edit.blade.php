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
			<label for="featured_img">Featured Image</label>
			<input type="file" class="form-control" id="featured_img"  name="featured_img">
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="published">Published</label>
			<input type="checkbox" class="form-control" id="published" name="published" value="1" {{ $post->published ? 'checked' : '' }}>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
		Url base path is {{ url('/') }}
	</form>
@endsection

@push('scripts')
	<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
	<script>
		tinymce.init({
			selector:'textarea#content',
			plugins: "link image lists hr",
			toolbar: "undo redo pageembed| styleselect | bold italic | hr | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			menubar: 'view',
			content_css: '/css/tinymce.css',
			relative_urls: false,
			convert_urls : true,
			formats: {
				italic: { inline: 'span', classes: 'italic' },
			},
			image_title: true,
			image_class_list: [
				{title: 'None', value: ''},
				{title: 'Album Cover', value: 'album-cover'},
			],
			automatic_uploads: true,
			images_upload_url: '/upload',
			images_upload_base_path: '{{ url('/') }}',
			file_picker_types: 'image',
			height: 600
		});
	</script>
@endpush
