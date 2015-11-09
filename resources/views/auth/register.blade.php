@extends('myapp')

@section('content')
<div class="container">
	<div class="jumbotron">
		<h1 align="center"> User Registration </h1>
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

		<form  class="form-horizontal col-md-4 col-md-offset-4" id="form-signup_v1" name="form-signup_v1" action="/auth/register" method="POST"  >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="field">
				<label for="signup-v1-firstname">First Name</label>
				<div class="ui center labeled input">

					<input id="signup-v1-firstname"
						   name="signup-v1-firstname"
						   type="text"
						   class="form-control"
						   data-validation="[L>=2]"
						   data-validation-message="$ must be at least 2 characters">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>





			<div class="field">
				<label for="signup-v1-lastname">Last Name</label>
				<div class="ui center labeled input">

					<input id="signup-v1-lastname"
						   name="signup-v1-lastname"
						   type="text"
						   class="form-control"

						   data-validation="[L>=2]"
						   data-validation-message="$ must be at least 2 characters">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>





			<div class="field">
				<label for="signup-v1-username">Username</label>
				<div class="ui center labeled input">

					<input id="signup-v1-username"
						   name="signup-v1-username"
						   type="text"
						   class="form-control"
						   data-validation="[L>=6, L<=18, MIXED]"
						   data-validation-message="$ must be between 6 and 18 characters. No special characters allowed."
						   data-validation-regex=""
						   data-validation-regex-message="The word &quot;Admin&quot; is not allowed in the $" >

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>
			<div class="field">
				<label for="signup-v1-password">Password</label>
				<div class="ui left labeled input">

					<input id="signup-v1-password"
						   name="signup-v1-password"
						   type="password"
						   class="form-control"
						   data-validation="[L>=8]"
						   data-validation-message="$ must be at least 8 characters">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>
			<div class="field">
				<label for="signup-v1-password_confirmation">Confirm Password</label>
				<div class="ui left labeled input">

					<input id="signup-v1-password_confirmation"
						   name="signup-v1-password_confirmation"
						   type="password"
						   class="form-control"
						   data-validation="[V==signup-v1-password]"
						   data-validation-message="$ does not match the password">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>
			<div class="field">
				<label for="signup-v1-email">Email</label>
				<div class="ui left labeled input">

					<input id="signup-v1-email"
						   name="signup-v1-email"
						   type="text"
						   class="form-control"
						   data-validation="[EMAIL]">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>
			<div class="field">
				<label for="signup-v1-email_confirmation">Confirm Email</label>
				<div class="ui left labeled input">

					<input id="signup-v1-email_confirmation"
						   name="signup-v1-email_confirmation"
						   type="text"
						   class="form-control"
						   data-validation="[V==signup-v1-email]"
						   data-validation-message="$ does not match the email">

					<div class="ui corner label">
						<i class="asterisk icon">*</i>
					</div>
				</div>
			</div>
			<p class="text-center">

				<button type="submit" class="btn btn-primary btn-lg active">Sign Up</button>
				<button id="prefill-signup_v1" type="button" class="ui mini basic button">
					Prefill
				</button>
			<p class="text-center">Already a member ?<a href="login" > Go and log in</a></p>
			<input type="hidden" name="honeypot" value="IS-421-RRZ" />

		</form>
	</div>
</div>
@endsection