@extends('admin.admin_master')

@section('admin')


<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Cambiar Contraseña</h2>
	</div>
	<div class="card-body">
		<form method="POST" action="{{route('password.update')}}" class="form-pill">
			@csrf
			<div class="form-group">
				<label for="current_password">Current Password</label>
				<input type="password" name="oldpassword" class="form-control" id="current_password" placeholder="Current Password">
				@error('oldpassword')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
				@error('password')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
				@error('password_confirmation')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<button class="btn btn-info" type="submit">Guardar</button>
		</form>
	</div>
</div>

@endsection
