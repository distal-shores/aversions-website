@if (session('status'))
	<div class="alert alert-{{ session('message_type') }} w-100" role="alert">
		{{ session('status') }}
	</div>
@endif
@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger w-100" role="alert">
		  {{ $error }}
		</div>
	@endforeach
@endif