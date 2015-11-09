@extends('myapp')

@section('content')
<div class="container">
	<div class="jumbotron">
		<h1 align="center"> Log In </h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form id="form-signin_v1" name="form-signin_v1" action="login" method="post" align="center" col-md-4 col-md-offset-4">
		<input type="hidden" name="_token" value='{{ csrf_token() }}'>
		<label>
			Username
			&nbsp;
			<input name="user" value="{{ old('user') }}" type="text" data-validation="[NOTEMPTY]"  class="form-control">
		</label><br>
		<label>
			Password
			&nbsp;
			<input name="password" type="password" data-validation="[NOTEMPTY]"  class="form-control">
		</label><br>
		<button type="submit" class="btn btn-primary btn-lg active">Login</button>
		<button  type="button" class="ui mini basic button" onClick="parent.location='register'">Sign up</button>

		<p></p><br>
		<p class="Forgot Username button">
			<a href="/username">Forgot Username </a>

				<p class="Forgot Password button">

					<a href="/password/email">Forgot Password </a>
				</p>
			</form>
	</div>
</div>
@endsection
