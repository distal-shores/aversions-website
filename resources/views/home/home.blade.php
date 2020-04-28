@extends('layouts.app')

@section('content')
    <div class="home-container">
        <div class="row top-nav no-gutters">
            @include('home.partials.top-nav')
        </div>
        <div class="row">
            @section('bottom-content')
            	@include('home.partials.show_list')
            @show
        </div>
    </div>
@endsection