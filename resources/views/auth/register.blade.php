 @extends('layouts.app')

@section('content')
<script type="text/javascript" >
	document.title = 'Triplan -Register';
</script>

<link href="{!! asset('pages/register/register.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js'></script>
<p id="pageName" hidden >Register</p>
<div id="fh5co-car" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
						<h3>Register to Triplan</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
<div class='ui shape'>
	<div class='sides'>
    		<div class='first active side'>
    		    <form id="formregister" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/register') }}" autocomplete="off">
                {{ csrf_field() }}
    			<div class='ui top attached piled segment'>
    				<div class='ui form'>
    					<div class='two fields'>
    						<div class='field required'>
    							<label>
    								First name
    							</label>
    							<input id="firstname" type="text" class="form-control" name="firstname" autocomplete="off" value="{{ old('firstname') }}" placeholder="First Name" autofocus>
                                @if ($errors->has('name'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
    						</div>
    						<div class='field required'>
    							<label>
    								Last name
    							</label>
    							<input id="lastname" type="text" class="form-control" name="lastname" autocomplete="off" value="{{ old('lastname') }}" placeholder="Last Name" >
    						</div>
    					</div>
    					<div class='two fields'>
        					<div class='field required'>
        						<label>
        							Email
        						</label>
        						<input id="email" type="email" class="form-control" name="email" autocomplete="off" value="{{ old('email') }}" placeholder="Email" >
                                @if ($errors->has('email'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        					</div>
        					<div class='field required'>
        						<label>
        							Username
        						</label>
        						<input required='true' name="username" type='text' placeholder="Username" value="{{ old('username') }}">
        					</div>
    					</div>
    					<div class='two fields'>
        					<div class='field required'>
        						<label>
        							Password
        						</label>
        						<input id="password" type="password" class="form-control" autocomplete="off" name="password" value="{{ old('password') }}" placeholder="Password">
                                <div id="password-strength-status"></div>
                                @if ($errors->has('password'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        					</div>
        					<div class='field required'>
        						<label>
        							Confirm your password
        						</label>
        						<input id="password-confirm" type="password" class="form-control" autocomplete="off" name="password_confirmation" placeholder="Re-type Password">
                                @if ($errors->has('password_confirmation'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
        					</div>
    					</div>
    					<div class='two fields'>
    					    <input id="gender" type="hidden" name="gender" value="">
    					    <div class='field required'>
        						<label>
        							Gender
        						</label>
        						<select class="ui dropdown" id="genderselector" name="gender">
                                  <option value=""></option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
        					</div>
        					<input id="country" type="hidden" name="country" value="">
    					    <div class='field required'>
        						<label>
        							Country
        						</label>
        						<select class="ui dropdown" id="countryselector" name="country">
                                    <option value=""></option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                              </select>
        					</div>
    					</div>
    					<div class='two fields'>
    					    
        					<div class='field'>
        						<label>
        							Age
        						</label>
        						<input id="age" name="age">
        					</div>
    					     <div class='field'>
        						<label>
        							Profile photo
        						</label>
        						
                                <div class="ui action input">
                                    <input class="profile_click" type="text" placeholder="Upload your profile photo" readonly>
                                    <input id="uploadphotouser" type="file" accept="image/png, image/jpeg" name="profile_phote_path">
                                    <div class="ui icon button">
                                        <i class="attach icon"></i>
                                    </div>
                                </div> 
        					</div>
    					</div>
    					<div class='field required'>
        					<div style="margin: 0 auto;width: 304px;">
                                 @if ($errors->has('g-recaptcha-response'))
                                    <span style="color:red;text-align:center;" class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                {!! NoCaptcha::renderJs('en') !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                        </div>
    					<div class='inline field'>
    							<input id="checkbox" type='checkbox'>
    							<label id="agreewarning">
    								I have read the <a href="{{ url('/general/terms') }}">terms and conditions</a>
    							</label>
    					</div>
    					<div class='ui divider'></div>
    				</div>
    			</div>
    			</form>
    			<div class='ui bottom attached large orange button' onclick="submition()">
    				Create my account
    			</div>
    		</div>
		
	</div>
</div>
</div>
				</div>
				
				
				<script src="{!! asset('pages/register/register.js') !!}"></script>
@endsection