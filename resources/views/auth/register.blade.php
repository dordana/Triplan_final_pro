 @extends('layouts.app')

@section('content')

<style type="text/css">
    .form-signin p{
    color: grey;
    }
    .form-signin .checkbox{
        color: grey;
    }
    .form-signin {
        max-width: 400px;
    }
    select{
        margin-bottom: 15px;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border: 1px solid #eaeaea;
        box-shadow: none;
        font-size: 10px;
        text-align: center;
    }
    
</style>
<script type="text/javascript">
$("#agreewarning").hide();
</script>

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <h1>Registration</h1>
            </div>
        </div>
    </div>
</div>

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
                <div class="login-wrap form-signin wow fadeInUp">
                    <h2 class="form-signin-heading">Register now</h2>
                    <br>
                    <form id="formregister" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    
                    <p>Enter your personal details</p>
                    <input id="firstname" type="text" class="form-control" name="firstname" autocomplete="off" value="{{ old('firstname') }}" placeholder="First Name" autofocus>
                    @if ($errors->has('name'))
                        <span style="color:red;" class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <input id="lastname" type="text" class="form-control" name="lastname" autocomplete="off" value="{{ old('lastname') }}" placeholder="Last Name" autofocus>

                    <input id="email" type="email" class="form-control" name="email" autocomplete="off" value="{{ old('email') }}" placeholder="Email" autofocus>
                    @if ($errors->has('email'))
                        <span style="color:red;" class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    
                    <input id="password" type="password" class="form-control" autocomplete="off" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span style="color:red;" class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <input id="password-confirm" type="password" class="form-control" autocomplete="off" name="password_confirmation" placeholder="Re-type Password">
                    @if ($errors->has('password_confirmation'))
                        <span style="color:red;" class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                    <input id="age" type="text" class="form-control" name="age" autocomplete="off" value="{{ old('age') }}" placeholder="Age" autofocus>
                    <select class="form-control text-center" id="genderselector" name="gender">
                            <option>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    </select>
                    <input id="gender" type="hidden" name="gender" value="">
                      <select class="form-control text-center" id="countryselector" name="country">
                            <option>Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                      </select>
                    <input id="country" type="hidden" name="country" value="">
                    <input class="file-browser" type="file" id="file" name="profile_phote_path">
                    <div id="agreecheck">
                        <label class="checkbox">
                        <input name="checkbox" id="checkbox" type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
                        </label>
                    <label id="agreewarning" style="color:red;text-align:center;">You must agree the Terms of Service and Privacy Policy</label>
                    </div>
                    
                    </form>
                    <button class="btn btn-lg btn-login btn-block" id="submit1">Submit</button>

                    <p>
                        Already Registered ?
                        <a class="" href="{{ url('/login') }}">
                            Login
                        </a>
                    </p>
                </div>
            

        </div>
     </div>
    <!--container end-->
<script type="text/javascript">
$("#agreewarning").hide();
    $("#submit1").click(()=>{
    
        if($('#checkbox').is(':checked'))
        {
            var selected = $("#genderselector").val();
            $("#gender").val(selected);
            var selected1 = $("#countryselector").val();
            $("#country").val(selected1);
            $("#formregister").submit();
        }else
        {
            $("#agreewarning").show();
            $('label.checkbox').css("color","red");
            var fade_out = function() {
              $("#agreewarning").hide();
              $('label.checkbox').css("color","");
            }
            
            setTimeout(fade_out, 4000);
        }
    })
    
    
    
</script>
@endsection