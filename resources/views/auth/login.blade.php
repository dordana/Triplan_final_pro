@extends('layouts.app')

@section('content')
<style type="text/css">
    .help-block{
        text-align: center;
        color: red;
        border: 3px solid red;
    }
    .login-social-link a.google {
    background: #fc7171;
    border-radius: 3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    float: left;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.login-social-link a.google:hover {
    background: #d83c3c;
    border-radius: 3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.login-social-link {
    display: inline-block;
    margin-top: 20px;
    margin-bottom: 15px;
}
.login-social-link a {
    color: #fff;
    padding: 15px 28px;
    border-radius: 1px;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
}
.login-social-link a:hover { color: #fff }
.login-social-link a i {
    font-size: 20px;
    padding-right: 10px;
}
.form-signin p{
    color: grey;
}
.form-signin .checkbox{
    color: grey;
}
</style>
<link href="css/bootstrap-social.css" rel="stylesheet" >
<div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>

    <!--container start-->
    <div class="login-bg">
        <div class="container">
            <div class="form-wrapper">
                
            <form class="form-signin wow fadeInUp" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                {{ csrf_field() }}
                <h2 class="form-signin-heading">sign in now</h2>
                <div class="login-wrap">
                    @if ($errors->has('email'))
                            <script type="text/javascript">
                                var fade_out = function() {
                                  $("span.help-block").delay(3200).fadeOut(300);
                                }
                                
                                setTimeout(fade_out, 5000);
                            </script>
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="email" type="email" value="" class="form-control" name="email" placeholder="E-mail address" autofocus autocomplete="off">
                    <input id="password" type="password" value="" class="form-control" placeholder="Password" name="password" autocomplete="off">
                    
                    <label class="checkbox">
                        <input type="checkbox" name="remember"> Remember Me
                        <span class="pull-right">
                            <a data-toggle="modal" href="#">Forgot Your Password?</a>
                        </span>
                    </label>
                    <button class="btn btn-lg btn-login btn-block done" type="submit" >Sign in</button>
                    <hr>
                    <p>You can sign in via social network</p>
                    <div class="login-social-link">
                        <a href="{{ url('/auth/facebook') }}" class="facebook">
                            <i class="fa fa-facebook"></i>
                            Facebook
                        </a>
                        <a href="{{ url('/auth/google') }}" class="google">
                            <i class="fa fa-google-plus"></i>
                            Google
                        </a>
                    </div>
                    <div class="registration">
                        Don't have an account yet?
                        <a class="" href="{{ url('/register') }}">
                            Create an account
                        </a>
                    </div>
                </div>
          </form>
          </div>
        </div>
    </div>

<script type="text/javascript">
if(!document.__defineGetter__) {
    Object.defineProperty(document, 'cookie', {
        get: function(){return ''},
        set: function(){return true},
    });
} else {
    document.__defineGetter__("cookie", function() { return '';} );
    document.__defineSetter__("cookie", function() {} );
}
</script>
@endsection