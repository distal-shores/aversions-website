@extends('layouts.app')

@section('content')
    <div class="home-container">
        <div class="row top-nav no-gutters">
            @include('home.partials.top-nav')
        </div>
        <div class="row no-gutters">
            <div class="col px-2 py-2 home-content">
                @section('bottom-content')
                	@include('home.partials.show_list')
                    @include('home.partials.divider')
                    @include('home.partials.quote_carousel')
                    @include('home.partials.divider')
                    @include('home.partials.latest_release')
                    @include('home.partials.divider')
                    @include('home.partials.newsletter_signup')
                @show
            </div>
        </div>
        <div class="row no-gutters">
            @include('home.partials.footer')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/header.js') }}"></script>
@endpush