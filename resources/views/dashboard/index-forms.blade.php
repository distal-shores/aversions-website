@extends('layouts.app')

@section('content')
	<div class="col-12">
		@include('dashboard.partials.dashboard-header')
		<div class="row no-right-margin">
			<div class="col-md-2 dashboard-nav">
				@include('dashboard.left_nav')
			</div>
			<div class="col-md-6 dashboard-content">
				@yield('right_pane')
			</div>
			<div class="col-md-4 dashboard-content">
				@include('dashboard.partials.notifications')
				@yield('form-image')
			</div>
		</div>
	</div>
@endsection

@push('robots')
    <meta name="robots" content="nofollow"/>
@endpush