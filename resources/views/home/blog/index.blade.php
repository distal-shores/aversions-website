@extends('home.home')

@section('wrapper-class')
blog-index
@endsection

@section('bottom-content')
	<div class="blog-index_list">
		@foreach($posts as $post)
		@php
			$backgroundImg = $post->featured_img == null ? 'storage/blog/featured_imgs/aversions_bground.jpg' : 'storage/blog/featured_imgs/'.$post->featured_img;
		@endphp
			<div class="blog-index_list_item_border">
				<div class="blog-index_list_item" style="background-image:url({{asset($backgroundImg)}});">
					<div class="blog-index_list_item_overlay"></div>
					<a class="no-hover" href="{!! url('/post/' . $post->slug) !!}">
						<h3>{{ $post->title }}</h3>
						<p class="se">{{ $post->user->display_name }}</p>
						<p class="se">{!! strip_tags(Str::limit($post->content, 130)) !!}</p>
					</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection