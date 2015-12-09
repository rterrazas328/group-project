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
    <link href="/css/cover.css" rel="stylesheet">

    @if($page_name == "admin")
        <title>Administrator Page</title>
    @elseif($page_name == "profile")
        <title>Profile Page</title>
        <script src="/js/validate.js"></script>
    @elseif($page_name == "login")
        <title>Login Page</title>
        <link href="/css/jquery.validation.css" rel="stylesheet" >
        <script src="/js/jquery.validation.js"></script>
        <script>
            $('#form-signup_v1').validate();
        </script>
    @elseif($page_name == "home")
        <title>Home Page</title>
        <script type="text/javascript" src="/js/script.js"></script>
    @elseif($page_name == "password")
        <title>Email Password Reset Link</title>
        <link href="/css/jquery.validation.css" rel="stylesheet" >
        <script src="/js/jquery.validation.js"></script>
        <script>
            $('#form-signup_v1').validate();
        </script>
    @elseif($page_name == "reset")
        <title>Reset Your Password</title>
    @elseif($page_name == "register")
        <title>Register Your Own Account</title>
        <link rel="stylesheet" href="jquery.validation.css">
        <link rel="stylesheet" href="/css/jquery.mobile-1.3.2.min.css"/>
        <link rel="stylesheet" href="/css/validation.css" />
        <script type="text/javascript" src="/js/livevalidation_standalone.js"></script>
        <script src="/js/jquery.validation.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script>
            $('#form-signup_v1').validate({
                submit: {
                    settings: {
                        inputContainer: '.field'
                    },
                    callback: {
                        onBeforeSubmit: function (node) {
                            myBeforeSubmitFunction(':D', ':)', node);
                        },
                        onSubmit: function (node) {
                            console.log('#' + node.id + ' has a submit override.');
                            //node.submit();
                        }
                    }
                },
                debug: true
            });
            function myBeforeSubmitFunction(a, b, node) {
                console.log(a, b);
                $(node).find('input:not([type="submit"]), select, textarea').attr('readonly', 'true');
                $(node).append('<div class="ui active loader"></div>');
            }
            $('#prefill-signup_v1').on('click', function () {
                var form = $(this).closest('form');
                form.find('#signup_v1-firstname').val('John');
                form.find('#signup_v1-lastname').val('Doe');
                form.find('#signup_v1-username').val('RocketJoe');
                form.find('#signup_v1-password').val('test123');
                form.find('#signup_v1-password-confirm').val('test123');
                form.find('#signup_v1-email').val('test@test.test');
                form.find('#signup_v1-email-confirm').val('test@test.test');
            });
        </script>
    @elseif($page_name == "username")
        <title>Retrieve Username</title>
        <link href="/css/jquery.validation.css" rel="stylesheet" >
        <script src="js/jquery.validation.js"></script>
        <script src="http://w3resource.com/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-tooltip.js"></script>
        <script src="http://w3resource.com/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-popover.js"></script>

        <script>
            $('#form-signup_v1').validate();
        </script>
    @endif
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
                        <li id="homePage"><a href="home">Home</a></li>
                        <li id="profilePage"><a href="editprofile">Edit Profile</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::user()['userlevel'] == 1)
                            <li id="adminPage"><a href="admin">Admin</a></li>
                        @endif
                        <li id="logoutPage"><a href="/auth/logout"><u>Logout</u></a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li id="homePage"><a href="/">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="registerPage"><a href="/auth/register"><u>Sign Up</u></a></li>
                    </ul>
                @endif
                    @if($page_name == "admin")
                        <script>
                            $("#adminPage").addClass("active");
                            $("#adminPage a").append("<span class='sr-only'>(current)</span>");
                        </script>
                    @elseif($page_name == "profile")
                        <script>
                            $("#profilePage").addClass("active");
                            $("#profilePage a").append("<span class='sr-only'>(current)</span>");
                        </script>
                    @elseif($page_name == "login")
                        <script>
                            $("#homePage").addClass("active");
                            $("#adminPage a").append("<span class='sr-only'>(current)</span>");
                        </script>
                    @elseif($page_name == "home")
                        <script>
                            $("#homePage").addClass("active");
                            $("#adminPage a").append("<span class='sr-only'>(current)</span>");
                        </script>
                    @elseif($page_name == "password")

                    @elseif($page_name == "reset")

                    @elseif($page_name == "register")
                        <script>
                            $("#registerPage").addClass("active");
                            $("#registerPage a").append("<span class='sr-only'>(current)</span>");
                        </script>
                    @elseif($page_name == "username")

                    @endif
            </div>
        </div>
    </nav>

@yield('content')

</body>

</html>