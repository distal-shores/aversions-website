@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Global Settings</h1>
	<form class="w-100" action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
		@csrf
        <div class="form-group">
            <h4>Splash Page Enabled?</h4>
			<label class="switch">
                <input type="checkbox" id="splash_enabled" name="splash_enabled" {{ $splashEnabled ? 'checked' : ''}}>
                <span class="slider round"></span>
            </label>
		</div> {{-- /form-group --}}
        <div class="form-group">
            <h4>EPK Header Image</h4>
            @if( isset($epkHeaderImg) )
                <div>
                    <h5>Current Image</h5>
                    <img class="img-fluid" src="{{ asset('storage/epk_headers/'.$epkHeaderImg) }}">
                </div>
            @endif
            <h5>Change/Add Image</h5>
			<input type="file" class="form-control" id="epk_header_img"  name="epk_header_img">
		</div> {{-- /form-group --}}
        <div class="form-group">
            <h4>EPK Background Colour</h4>
            @if( isset($epkBgColour) )
                <div style="background-color:#{{ $epkBgColour }}; width: 100%; height: 30px;">Current colour</div>
            @endif
            <p>Six-digit hexidecimal value</p>
			<input type="text" class="form-control" id="epk_bg_colour"  name="epk_bg_colour" value="{{ $epkBgColour }}">
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
