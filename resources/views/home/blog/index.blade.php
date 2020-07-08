@extends('home.home')

@section('bottom-content')
	@foreach($posts as $post)
		{{-- {{dump($posts)}} --}}
		<h3>{{ $post->title }}</h3>
		<p>By {{ $post->user->name }}</p>
		<p>{!! Str::limit($post->content, 200) !!}</p>
	@endforeach
@endsection