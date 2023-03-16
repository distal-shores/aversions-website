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
                    <img class="img-fluid" src="{{ Storage::disk('s3')->url('epk_headers/'.$epkHeaderImg) }}">
                </div>
            @endif
            <h5>Change/Add Image</h5>
			<input type="file" class="form-control" id="epk_header_img"  name="epk_header_img">
		</div> {{-- /form-group --}}
        <h4>EPK Colours</h4>
        <p>Six-digit hexidecimal values for below</p>
        <div class="form-group">
            <h5>EPK Background Colour</h5>
            @if( isset($epkBgColour) )
                <div style="background-color:#{{ $epkBgColour }}; width: 100%; height: 30px;">Current colour</div>
            @endif
			<input type="text" class="form-control" id="epk_bg_colour"  name="epk_bg_colour" value="{{ $epkBgColour }}">
		</div> {{-- /form-group --}}
        <div class="form-group">
            <h5>EPK Button Colour</h5>
            @if( isset($epkButtonColour) )
                <div style="background-color:#{{ $epkButtonColour }}; width: 100%; height: 30px;">Current colour</div>
            @endif
			<input type="text" class="form-control" id="epk_button_colour"  name="epk_button_colour" value="{{ $epkButtonColour }}">
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
