@extends('layouts.app')

@section('content')
	<div class="col-12">
		@include('dashboard.partials.dashboard-header')
		<div class="row no-right-margin">
			<div class="col-sm-4 col-lg-2 dashboard-nav">
				@include('dashboard.left_nav')
			</div>
			<div class="col-sm-8 col-lg-10 dashboard-content">
				@include('dashboard.partials.notifications')
	    		@if(View::hasSection('right_pane'))
	        		@yield('right_pane')
	    		@else
	        		Welcome to the Aversions dashboard
	    		@endif
			</div>
		</div>
	</div>
@endsection

@push('robots')
	<meta name="robots" content="noindex, nofollow"/>
@endpush

@push('scripts')
	<script src="https://kit.fontawesome.com/a0715c098b.js" crossorigin="anonymous"></script>
@endpush