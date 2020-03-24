@extends('layouts.app')

@section('content')
	@include('dashboard.partials.dashboard-header')
	<div class="row no-right-margin">
		<div class="col-md-2 dashboard-nav">
			@include('dashboard.left_nav')
		</div>
		<div class="col-md-10 dashboard-content">
			@include('dashboard.partials.notifications')
			@yield('right_pane')
		</div>
	</div>
@endsection