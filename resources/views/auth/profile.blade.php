@extends('layouts.app')

@section('content')
<link href="{!! asset('pages/profile/profile.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<p id="pageName" hidden >Other</p>

<div id="fh5co-car" class="fh5co-section-gray">
			<div class="container">
				<div class="row">

<div class="col-md-12">
  	<!-- Form Wrapper -->
	<form id="form-wrapper" class="form-horizontal" role="form" action="{{ url('/profile') }}" method="POST">
	    {{ csrf_field() }}
		<div id="form-left-wrapper">
			<div id="form-tab-menu">
				<div class="tab-menu-item current personal-tab">Personal info</div>
				<div class="tab-menu-item add-tab">Payment</div>
				<div class="tab-menu-item other-tab">Confirmation</div>
			</div>
			<!-- Body of the Form -->
			<div id="form-body">
				<div id="personal-tab">
					<div id="contact-details">
						<div class='form-input input-small'>
							<label>First name</label><br/>
							<input value="{{Auth::user()->firstname}}" type='text' name='firstname' placeholder='First Name' id='firstname-input' class='name-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Last name</label><br/>
							<input value="{{Auth::user()->lastname}}" type='text' name='lastname' placeholder='Last Name' id='lastname-input' class='name-input'/>
						</div>
						<div class='form-input input-small'>
							<label>User name</label><br/>
							<input value="{{Auth::user()->username}}" type='text' name='username' placeholder='User Name' id='lastname-input' class='name-input'/>
						</div>
						
					</div>
					<div class='hr'></div>
					<div id="Address-details">
						<div class='form-input input-small'>
							<label>Age</label><br/>
							<input value="{{Auth::user()->age}}" type='number' name='age' placeholder='Age' id='contact-input' class='number-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Email Address</label><br/>
							<input value="{{Auth::user()->email}}" type='email' name='email' placeholder='Email Address' id='address-input' class='address-input'/>
						</div>
                        @if(!Auth::user()->provider)
						<div class='form-input input-small'>
							<label>Password</label><br/>
                            <a class="change-password btn" data-toggle="modal" data-target="#change-password-modal" data-user-email="{{ Auth::user()->email }}">Change Password</a>
						</div>
						@endif
						<div class='form-input input-small'>
							<label>Country</label><br/>
							<input value="{{Auth::user()->country}}" type='text' name='country' placeholder='Country' id='country-input' class='country-input'/>
						</div>
						<div class='form-input input-small'>
							<label>City</label><br/>
							<input value="{{Auth::user()->city}}" type='text' name='city' placeholder='City' id='city-input' class='city-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Gender</label><br/>
							<input value="{{Auth::user()->gender}}"type='text' name='gender' placeholder='Gender' id='postcode-input' class='postcode-input'/>
						</div>
						<div class='hr' style='margin-bottom: 5px;'></div>
					</div>
				</div>
				<div id="add-tab">
					<div id="contact-details">
						<div class='form-input input-small'>
							<label>First name paym</label><br/>
							<input type='text' name='' placeholder='First Name' id='firstname-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Last name</label><br/>
							<input type='text' name='' placeholder='Last Name' id='lastname-input'/>
						</div>
						<div class='form-input input-small'>
							<label>E-mail</label><br/>
							<input type='email' name='' placeholder='E-Mail Address' id='email-input'/>
						</div>
					</div>
					<div class='hr'></div>
					<div id="Address-details">
						<div class='form-input input-small'>
							<label>Contact Number</label><br/>
							<input type='number' name='company' placeholder='Contact Number' id='contact-input'/>
						</div>
						<div class='form-input input-medium'>
							<label>Street Address</label><br/>
							<input type='text' name='address' placeholder='Street Address' id='address-input'/>
						</div>
						<!-- Line Break -->
						<div class='form-input input-small'>
							<label>Country</label><br/>
							<input type='text' name='' placeholder='Country' id='country-input'/>
						</div>
						<div class='form-input input-small'>
							<label>City</label><br/>
							<input type='text' name='' placeholder='City' id='city-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Post Code</label><br/>
							<input type='number' name='' placeholder='Post Code' id='postcode-input'/>
						</div>
						<div class='hr' style='margin-bottom: 5px;'></div>
					</div>
				</div>
				<div id="other-tab">
					<div id="contact-details">
						<div class='form-input input-small'>
							<label>First name conf</label><br/>
							<input type='text' name='' placeholder='First Name' id='firstname-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Last name</label><br/>
							<input type='text' name='' placeholder='Last Name' id='lastname-input'/>
						</div>
						<div class='form-input input-small'>
							<label>E-mail</label><br/>
							<input type='email' name='' placeholder='E-Mail Address' id='email-input'/>
						</div>
					</div>
					<div class='hr'></div>
					<div id="Address-details">
						<div class='form-input input-small'>
							<label>Contact Number</label><br/>
							<input type='number' name='company' placeholder='Contact Number' id='contact-input'/>
						</div>
						<div class='form-input input-medium'>
							<label>Street Address</label><br/>
							<input type='text' name='address' placeholder='Street Address' id='address-input'/>
						</div>
						<!-- Line Break -->
						<div class='form-input input-small'>
							<label>Country</label><br/>
							<input type='text' name='' placeholder='Country' id='country-input'/>
						</div>
						<div class='form-input input-small'>
							<label>City</label><br/>
							<input type='text' name='' placeholder='City' id='city-input'/>
						</div>
						<div class='form-input input-small'>
							<label>Post Code</label><br/>
							<input type='number' name='' placeholder='Post Code' id='postcode-input'/>
						</div>
						<div class='hr' style='margin-bottom: 5px;'></div>
					</div>
				</div>
				<div id="form-submit">
			              <input type="submit" value="Save Changes">
				</div>
			</div>
		</div>
		<!-- Shopping Cart Menu -->
		<div id="form-cart-menu">
			<div class="shopping-cart-head">
				<h1 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
			</div>
			<div class="container-user-profile-photo">
              <img src="{{ url('/uploads/user-photos') }}/{{Auth::user()->profile_phote_path}}" alt="{{ url('/uploads/Icons/userprofile.png') }}" />
              <div class="overlay"></div>
                <div class="button"><a class="" data-toggle="modal" data-target="#change-photo-modal" data-user-email="{{ Auth::user()->email }}">Change</a></div>
            </div>
            <br>
			<table id="shopping-cart-menu">
				<tr class='shopping-cart-item'>
					<td class='cart-title'>Likes</td>
					<td class='cart-price'>{{ Auth::user()->num_of_likes }}</td>
				</tr>
				<tr class='shopping-cart-item'>
					<td class='cart-title'>Shares</td>
					<td class='cart-price'>{{ Auth::user()->num_of_shares }}</td>
				</tr>
				<tr class='shopping-cart-item'>
					<td class='cart-title'>Paths</td>
					<td class='cart-price'>{{ Auth::user()->num_of_paths }}</td>
				</tr>
			</table>
		</div>
	</form>
</div>
</div>








</div>
				</div>
<!-- Modal change password -->
    <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="change-password-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    
                    
                    <div id="box">
                      <form action="{{ route('change-password') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="email" value="">
                      <h1>Change Password <span><br>choose a good one!</span></h1>
                        <p>
                          <input type="password" maxlength="12" minlength="6" autocomplete="off" name="oldpassword" value="" placeholder="Enter your old passowrd" class="password">
                          <button class="unmask" type="button"></button>
                        </p>
                        <p>
                          <input type="password" maxlength="12" minlength="6" autocomplete="off" name="password" value="" placeholder="Enter your new password" id="p" class="password">
                          <button class="unmask" type="button"></button>
                        </p>
                        <p>     
                          <input type="password" maxlength="12" minlength="6" autocomplete="off" name="password_confirmation" value="" placeholder="Confirm your new password" id="p-c" class="password">
                          <button class="unmask" type="button"></button>
                        <div id="strong"><span></span></div>
                        <div id="valid"></div>
                        <p><input id="uploadphoto" type="submit" value="save" /></p>
                        </p>
                      </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change photo -->
    <div class="modal fade" id="change-photo-modal" tabindex="-1" role="dialog" aria-labelledby="change-photo-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <main>
                    <form action="{{ route('change-photo') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                		<h2 class="text-center">Change picture</h2>
            			
            			<p><input type="file" id="id_photo" name="profile_phote_path"/></p>
            			<br>
            			<p><input id="uploadphoto" type="submit" value="save" /></p>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
				</div>  
<script src="{!! asset('pages/profile/profile.js') !!}"></script>

@endsection