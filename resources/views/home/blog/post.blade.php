@extends('home.home')

@section('ogimg')
{{ asset('storage/blog/featured_imgs/' . $post->featured_img) }}
@endsection

@section('ogtitle')
{{ $post->title }}
@endsection

@section('wrapper-class')
blog-post
@endsection

@section('bottom-content')
	@php
		$backgroundImg = $post->featured_img == null ? 'storage/blog/featured_imgs/aversions_bground.jpg' : 'storage/blog/featured_imgs/'.$post->featured_img;
	@endphp
	<div class="blog-post_hero">
		<div class="blog-post_hero_img" style="background-image:url({{asset($backgroundImg)}});"></div>
		<div class="blog-post_hero_overlay"></div>
		<h1>{{ $post->title }}</h1>
		<div class="blog-post_byline">
			Posted on {{ date('M j, Y', strtotime($post->created_at)) }} by {{ $post->user->display_name }}
		</div>
	</div>
	{!! $post->content !!}
	<div class="blog-post_return-link">
		<a href="{{ url('/blog') }}" alt="Return to blog post listing"></a>
		<span>Back to Blog Posts</span>
	</div>
@endsection