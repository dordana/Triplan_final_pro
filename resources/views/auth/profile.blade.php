@extends('layouts.app')

@section('content')
<link href="{!! asset('pages/profile/profile.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<p id="pageName" hidden >Other</p>

<div id="fh5co-car" style="height: 100vh" class="fh5co-section-gray">
			<div class="container">
				<div class="row">

<div class="col-md-12">
  	<!-- Form Wrapper -->
	<form id="form-wrapper" class="form-horizontal" role="form" action="{{ url('/profile') }}" method="POST">
	    {{ csrf_field() }}
		<div id="form-left-wrapper">
			<div id="form-tab-menu">
				<div class="tab-menu-item current personal-tab">Personal info</div>
				<div class="tab-menu-item add-tab">My friends</div>
				<div class="tab-menu-item other-tab">My paths</div>
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
						<br><br><br><br><br><br>
						<div class='hr' style='margin-bottom: 5px;'></div>
					</div>
				</div>
				<div id="add-tab">
					<style>

					.results tr[visible='false'],
					.no-result{
					  display:none;
					}
					
					.results tr[visible='true']{
					  display:table-row;
					}
					
					.counter{
					  padding:8px; 
					  color:#ccc;
					}
					.form-control {
					    width: 98% !important;
					}
					th, td{
						text-align: center;
					}
					</style>

<div class="form-group ">
    <input type="text" class="search form-control" placeholder="Search friends..">
</div>
<span class="counter "></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th class="col-md-3 col-xs-3">First name</th>
      <th class="col-md-3 col-xs-3">Last name</th>
      <th class="col-md-1 col-xs-1">Country</th>
      <th class="col-md-1 col-xs-1">Age</th>
       <th class="col-md-3 col-xs-3">Actions</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
  	@foreach(Auth::user()->friends as $friend)
	    <tr class="tr{{$friend->user_friend_id}}">
	      <td>{{App\User::find($friend->user_friend_id)->firstname}}</td>
	      <td>{{App\User::find($friend->user_friend_id)->lastname}}</td>
	      <td>{{App\User::find($friend->user_friend_id)->country}}</td>
	      <td>{{App\User::find($friend->user_friend_id)->age}}</td>
	      <td>
	      	<div class="actionsButtons" style="display:flex;">
	      		<a href="{{route('showuserprofile', $friend->user_friend_id)}}" class="btn btn-primary" style="background-color:#74a948; width: 50%; height:40%;    display: inline-table; margin-right:10px;">View</a>
	      		<a  class="btn btn-primary" style="background-color: #00aeff; width: 50%; height:40%;    display: inline-table;">Message</a>
				<a class="btn btn-primary delete-friend" friendId="{{$friend->user_friend_id}}" style="background-color:#fc5a5a; width: 50%; height:40%; display: inline-table; margin-left:10px;">Delete</a>
	      	</div>
	      </td>
	    </tr>
    @endforeach
  </tbody>
</table>
<br><br><br><br><br><br>
	<div class='hr' style='margin-bottom: 5px;'></div>

				</div>
				<div id="other-tab">
					<div class="form-group ">
					    <input type="text" class="search form-control" placeholder="Search friends..">
					</div>
					<span class="counter "></span>
					<table class="table table-hover table-bordered results">
					  <thead>
					    <tr>
					      <th class="col-md-3 col-xs-3">Path name</th>
					      <th class="col-md-3 col-xs-3">Start date</th>
					      <th class="col-md-1 col-xs-1">End date</th>
					      <th class="col-md-1 col-xs-1">City</th>
					      <th class="col-md-3 col-xs-3">Country</th>
					       <th class="col-md-3 col-xs-3">Type</th>
					        <th class="col-md-3 col-xs-3">Actions</th>
					    </tr>
					    <tr class="warning no-result">
					      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(Auth::user()->paths as $path)
						    <tr class="trP{{$path->id}}">
						      <td>{{$path->pathName}}</td>
						      <td>{{ Carbon\Carbon::parse($path->startDate)->format('d/m/Y') }}</td>
						      <td>{{ Carbon\Carbon::parse($path->endDate)->format('d/m/Y') }}</td>
						      <td>{{$path->cityname}}</td>
						      <td>{{$path->countryName}}</td>
						      <td>{{$path->type}}</td>
						      <td>
						      	<div class="actionsButtons" style="display:flex;">
						      		@if($path->shared == "1")
						      			<a href="#" class="btn btn-primary notshared" pathId="{{$path->id}}" style="background-color:#00aeff; width: 50%; height:40%;    display: inline-table; margin-right:10px;">Shared</a>
						      		@else
						      			<a href="#" class="btn btn-primary shared" pathId="{{$path->id}}" style="background-color:#00aeff; width: 50%; height:40%;    display: inline-table; margin-right:10px;">Not shared</a>
						      		@endif
						      		<a href="{{route('tripbuilder', $path->toArray())}}" class="btn btn-primary" style="background-color:#74a948; width: 50%; height:40%;    display: inline-table; margin-right:10px;">View</a>
									<a class="btn btn-primary delete-path" pathId="{{$path->id}}" style="background-color:#fc5a5a; width: 50%; height:40%; display: inline-table; margin-left:10px;">Delete</a>
						      	</div>
						      </td>
						    </tr>
					    @endforeach
					  </tbody>
					</table>
					<br><br><br><br><br><br>
						<div class='hr' style='margin-bottom: 5px;'></div>
				</div>
				<div id="form-submit">
			              <input style="    width: 24%; !important" type="submit" value="Save Changes">
				</div>
			</div>
		</div>
		<!-- Shopping Cart Menu -->
		<div id="form-cart-menu">
			<div class="shopping-cart-head">
				<h1 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
			</div>
			<div class="container-user-profile-photo">
				@if(Auth::user()->profile_phote_path != null)
              		<img src="{{ url('/uploads/user-photos') }}/{{Auth::user()->profile_phote_path}}" alt="ttps://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
              	@else
            		<img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" />
				@endif
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
<script type="text/javascript">
$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
$(".delete-friend").click(function(){
	

	var friendId = $(this).attr("friendId");
		$(".tr"+friendId).remove();
	console.log($(".tr"+friendId));
	var url = "{{route('deletefriend')}}";
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
    	type: 'ajax',
    	method: 'post',
    	url: url,
    	data: {id:friendId},
    	async: false,
    	dataType: 'json',
    	success: function(data){
    	    $(".tr"+friendId).hide();
    	},
    	error: function(data){
    		console.log(data)
    	}
    });
});
$(".delete-path").click(function(){
	

	var pathId = $(this).attr("pathId");
		$(".trP"+pathId).remove();
	var url = "{{route('deletepath')}}";
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
    	type: 'ajax',
    	method: 'post',
    	url: url,
    	data: {id:pathId},
    	async: false,
    	dataType: 'json',
    	success: function(data){
    		console.log(data)
    	},
    	error: function(data){
    		console.log(data)
    	}
    });
});


$(".notshared, .shared").click(function(){
	var a = $(this);
	var pathId = $(this).attr("pathId");
	var url = "{{route('sharepath')}}";
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
    	type: 'ajax',
    	method: 'post',
    	url: url,
    	data: {id:pathId},
    	async: false,
    	dataType: 'json',
    	success: function(data){
    		location.reload();	
    	},
    	error: function(data){
    		location.reload();
    	}
    });
});

});
</script>
@endsection