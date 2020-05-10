@extends('layouts.app')

@section('content')
	@include('dashboard.partials.dashboard-header')
	<div class="row no-right-margin">
		<div class="col-md-2 dashboard-nav">
			@include('dashboard.left_nav')
		</div>
		<div class="col-md-10 dashboard-content">
			@include('dashboard.partials.notifications')
    		@if(View::hasSection('right_pane'))
        		@yield('right_pane')
    		@else
        		Welcome to the Aversions dashboard
    		@endif
		</div>
	</div>
@endsection

@push('robots')
    <meta name="robots" content="nofollow"/>
@endpush