@extends('layouts.app')

@section('content')
	<div class="row">
		<h1>Aversions Dashboard</h1>
	</div>
	<div class="row">
		<div class="col-md-2">
			@include('dashboard.left_nav')
		</div>
		<div class="col-md-6">
			@yield('right_pane')
		</div>
		<div class="col-md-4">
			@include('dashboard.partials.notifications')
			@yield('form-image')
		</div>
	</div>
@endsection