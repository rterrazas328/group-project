@extends('myapp')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 align="center"> Username Retrieval </h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <h1 class="register-title" valign="middle" align="center">UMS</h1>
        <form id="form-signup_v1" name="form-signup_v1" action="username" method="POST" class="validation-form-container col-md-4 col-md-offset-4" align="center" >
            <input type="hidden" name="_token" value='{{ csrf_token() }}'>
            </br>
            <div class="field">
                <label>
                    Email
                    &nbsp;
                    <input name="email" type="text" data-validation="[NOTEMPTY]"  class="form-control">
                </label>
                <div class="ui corner label">

                    <button type="submit" class="btn btn-primary btn-lg active">Submit</button>



                </div>
            </div>
        </form>
    </div>


</div>
@endsection
