 @extends('layouts.app')

@section('content')
<script src="{!! asset('pages/login/login.js') !!}"></script>
<link href="{!! asset('pages/login/login.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css'>
<p id="pageName" hidden >Login</p>

<div id="fh5co-car" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
				<h3>Login to Triplan</h3>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
			<div class="col-md-12">
		<div id="login" class='ui shape animate-box' >
			<div class='sides'>
				<div class='first side active'>
					<div class='ui top attached piled segment'>
						<div class="share">
						  <a href="{{ route('facebook') }}" class="fb">Facebook</a>
						  <a href="{{ route('google') }}" class="go">Google</a>
						</div>
						<div class='ui horizontal divider'>OR</div>
						<form class="form-signin wow fadeInUp" role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
		                {{ csrf_field() }}
		    				<div class='ui form'>
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
		        					<div class='field required'>
		        						<label>
		        							Username/Email address
		        						</label>
		        							<input id="email" type="text" value="" class="form-control" name="email" autofocus autocomplete="off">
		        					</div>
		        					<div class='field required'>
		        						<label>
		        							Password
		        						</label>
		        						<input id="password" type="password" value="" class="form-control" name="password" autocomplete="off">
		                                @if (Session::has('errorform'))
		                                    <h5 style="color:red;text-align:center;">{{ Session::get('errorform')}}</h5>
		                                @endif
		        					</div>
		        					<div class='inline field'>
		        						<div class='ui toggle checkbox'>
		        							<input type='checkbox'>
		        							<label>
		        								Remember me
		        							</label>
		        						</div>
		        					</div>
		        					<br>
		        					<br>
		        					<div class='inline field'>
		        						<div>
		        							<label>
		        								Don't have an account yet?
		                                        <a class="" href="{{ url('/register') }}">
		                                            Create an account
		                                        </a>
		        							</label>
		        							<br>
		        							<label>
		        								Forgot Your Password?
		                                        <a class="" href="{{ url('/password/reset') }}">
		                                            Create a new one
		                                        </a>
		        							</label>
		        						</div>
		        					</div>
		        					<div class='ui divider'></div>
		        				</div>
		            			</div>
		            			<button class='ui bottom attached large primary button' type='submit'>
		            				Login
		            			</button>
					</form>
				</div>
			</div>
		</div>
			</div>
		</div>
		
	</div>
</div>
		
		
		
		
		


@endsection