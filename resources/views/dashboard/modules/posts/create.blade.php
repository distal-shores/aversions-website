@extends('dashboard.index')

@section('right_pane')
	<h1>Add a post</h1>
	<form class="w-100" action="{{ action('PostsController@store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="pullquote">Content</label>
			<textarea class="form-control" id="content" name="content"></textarea>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="featured_img">Featured Image</label>
			<input type="file" class="form-control" id="featured_img"  name="featured_img">
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="published">Published</label>
			<input type="checkbox" class="form-control" id="published" name="published">
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

@push('scripts')
	<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
	<script>
		tinymce.init({
			selector:'textarea#content',
			plugins: "link image lists hr",
			toolbar: "undo redo | styleselect | bold italic | hr | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image pageembed",
			image_title: true,
			relative_urls: false,
			convert_urls : true,
			content_css: '/css/tinymce.css',
			formats: {
				italic: { inline: 'span', classes: 'italic' },
			},
			automatic_uploads: true,
			image_class_list: [
				{title: 'None', value: ''},
				{title: 'Album Cover', value: 'album-cover'},
			],
			images_upload_url: '/upload',
			images_upload_base_path: '{{ url('/') }}',
			file_picker_types: 'image',
			height: 600
		});
	</script>
@endpush
