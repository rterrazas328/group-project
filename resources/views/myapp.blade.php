<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://w3resource.com/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-tooltip.js"></script>
    <script src="http://w3resource.com/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-popover.js"></script>
    <!--<script src="/js/jquery.validation.js"></script>-->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/template.css" rel="stylesheet">

    <title></title>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="#">
                    @if(Auth::check())
                        <img id="brand-image" class="img-circle" src="/img/icon.png"/>
                    @else
                        Company Name
                    @endif
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(Auth::check())

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="editprofile">Edit Profile</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::user()['userlevel'] == 1)
                            <li><a href="admin">Admin</a></li>
                        @endif
                        <li><a href="/auth/logout"><u>Logout</u></a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/"><u>Login</u></a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

@yield('content')

</body>

</html>