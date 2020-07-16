@extends('dashboard.index-forms')

@section('right_pane')
	<h1>Edit Profile</h1>
	<form class="w-100" action="{{ action('UsersController@update') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="name">Username</label>
			<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="content">Display Name</label>
			<input type="text" class="form-control" id="display_name" name="display_name" value="{{ $user->display_name }}"/>
		</div> {{-- /form-group --}}
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email"  name="email" value="{{ $user->email }}">
		</div> {{-- /form-group --}}
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection