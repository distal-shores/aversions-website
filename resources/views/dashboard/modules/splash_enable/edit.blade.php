@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Turn on/off splash page</h1>
	<form class="w-100" action="{{ route('splash.update') }}" method="post" enctype="multipart/form-data">
		@csrf
        <div class="form-group">
			<label class="switch">
                <input type="checkbox" id="splash_enabled" name="splash_enabled" {{ $splashEnabled ? 'checked' : ''}}>
                <span class="slider round"></span>
            </label>
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
