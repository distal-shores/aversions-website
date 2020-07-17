@extends('layouts.app')

@section('content')
	<div class="col-12">
		@include('dashboard.partials.dashboard-header')
		<div class="row no-right-margin">
			<div class="col-sm-4 col-md-3 col-lg-2 dashboard-nav">
				@include('dashboard.left_nav')
			</div>
			<div class="col-sm-4 col-md-5 col-lg-8 dashboard-content">
				@yield('right_pane')
			</div>
			<div class="col-sm-4 dashboard-content">
				@include('dashboard.partials.notifications')
				@yield('form-image')
			</div>
		</div>
	</div>
@endsection

@push('robots')
    <meta name="robots" content="nofollow"/>
@endpush

@push('scripts')
	<script src="https://kit.fontawesome.com/a0715c098b.js" crossorigin="anonymous"></script>
@endpush