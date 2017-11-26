@extends('layouts.app')

@section('content')
 <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"/>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="profile-header" style="background-image: url('http://www.lamacchiatravel.com/sites/default/files/styles/banner_1600x350/public/destinations/belize-001.jpg?itok=8TJDyJhS')">
        <figure id="userphoto" class="profile-picture"
                  @if(Auth::user()->profile_phote_path)
                  style="background-image: url(/uploads/user-photos/{{ Auth::user()->profile_phote_path }})">
                  @else
                  style="background-image: url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png)">
                  @endif
        </figure>
        <div class="profile-stats">
          <ul>
              <li>{{ Auth::user()->firstname . " " . Auth::user()->lastname }}<span>{{Auth::user()->email}}</span></li>
            <li>2 <span>Likes</span></li>
            <li>13 <span>Uploads</span></li>
            <li>2 <span>Shares</span></li>
            <li>13 <span>Photos</span></li>
            <li>2 <span>Comments</span></li>
            <li>2 <span>Visits</span></li>
            <li>13 <span>Feedbacks</span></li>
            <li>13 <span>Attractions</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  	<br>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-12 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" action="{{ url('/profile') }}" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="firstname" type="text" value="{{Auth::user()->firstname}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lastname" type="text" value="{{Auth::user()->lastname}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="{{Auth::user()->email}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Age:</label>
            <div class="col-md-8">
              <input class="form-control" name="age" type="text" value="{{Auth::user()->age}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Country:</label>
            <div class="col-md-8">
              <select class="form-control text-center" id="countryselector" name="country">
                    <option>{{Auth::user()->country}}</option>
                    @foreach($countries as $country)
                      @if(Auth::user()->country != $country->name)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                      @endif
                    @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Gender:</label>
            <div class="col-md-8">
              <select class="form-control text-center" id="genderselector" name="gender">
                    <option>{{Auth::user()->gender}}</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
              </select>
            </div>
          </div>
          @if(!Auth::user()->provider)
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
                  <a class="change-password btn-default btn btn-md" data-toggle="modal" data-target="#change-password-modal" data-user-email="{{ Auth::user()->email }}">Change Password</a>
            </div>
          </div>
          @else
          <div class="form-group">
            <label class="col-md-3 control-label">Registered with:</label>
            <div class="col-md-8">
                <input class="form-control" type="text" disabled value="{{Auth::user()->provider}}">
            </div>
          </div>
          @endif
          <div class="form-group">
            <label class="col-md-3 control-label">Photo:</label>
            <div class="col-md-8">
                  <a class="change-photo btn-default btn btn-md" data-toggle="modal" data-target="#change-photo-modal" data-user-email="{{ Auth::user()->email }}">Change your photo</a>
            </div>
          </div>
          <div class="form-group text-center">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<!-- Modal change password -->
    <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="change-password-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('change-password') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="email" value="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="change-password-modal">Changing user's password</h2>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" maxlength="12" minlength="6" name="oldpassword" class="form-control" id="oldpassword" autocomplete="off" placeholder="Old passowrd" required style="margin-bottom:5px;">
                            <input type="text" maxlength="12" minlength="6" name="password" class="form-control" id="password" autocomplete="off" placeholder="New passowrd" required style="margin-bottom:5px;">
                            <input type="text" maxlength="12" minlength="6" name="password_confirmation" class="form-control" autocomplete="off" id="password_confirmation" placeholder="Re-enter new password" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change photo -->
    <div class="modal fade" id="change-photo-modal" tabindex="-1" role="dialog" aria-labelledby="change-photo-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('change-photo') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="change-photo-modal">Change your photo</h2>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">    
                                <div class="col-xs-12 col-md-6 col-md-offset-1 col-sm-8">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview" >
                                        <input type="text" style="width:325px;" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input" style="margin: auto;">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="profile_phote_path"/> 
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                            </div>
                        </div>            
                        
                        
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <style type="text/css">
      .image-preview-filename {
          color: black;
      }
    </style>
    
    <script type="text/javascript">
      
      $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom',
    });
    
    // $('.image-preview').css("width",350);
    // $('.image-preview').css("height",250);
    
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $(".image-preview-filename").css("width", '325px');
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:240,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);  
            $(".image-preview-filename").css("width", '250px');
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
    </script>
    <style type="text/css">
      .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
    </style>
    
    
    
    <script>

        var email = null;
        $(".change-password").on('click', function(e){
            e.preventDefault();
            email = $(this).attr('data-user-email');
        });
        $('#change-password-modal').on('shown.bs.modal', function () {
            $('input[name=password]').focus();
            $('input[name=email]').val(email);
        });
    </script>
<style type="text/css">
.modal-header {
    background: #48cfad;
}
    /* Main Container */
.profile-header {
  box-shadow: 1px 1px 4px rgba(0,0,0,0.5);
  height:   300px;
  position: relative;
  /*width:    80%;*/
  /*margin: 20px auto;*/
}

/* Users background image*/
figure.profile-banner {
  left:     0;
  overflow: hidden;
  position: absolute;
  top:      0;
  z-index:  1;
  width:600px;
  height:300px;
}

/*Profile Picture*/
figure.profile-picture {
      background-position: center center;
    background-size: cover;
    border: 5px #efefef solid;
    border-radius: 50%;
    bottom: -80px;
    box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2), 1px 1px 4px rgba(0,0,0,0.3);
    height: 250px;
    left: 80%;
    position: absolute;
    width: 250px;
    z-index: 3;
}

/* Top Container */
div.profile-data {
  top: 0;
  left: 0;
  position: absolute;
  z-index: 2;
  color:#fff;
  text-shadow: 0 1px 1px rgba(0,0,0,.5);
  padding:20px;
}
.profile-data-left {
float:left; width:200px;
}
.profile-data-left i {
  font-size:24px;
  text-shadow:0 1px 1px rgba(0,0,0,.5);
  padding-right:10px;
}

.profile-data-right{
float:left; width:360px; padding-top:15px;
}
/* Name h1 */
.profile-data>h1 {
 
}
.profile-data-right h4 span {
  width:150px;
  display:inline-block;
}

.profile-data-right h4{
  margin-bottom:20px;
}

/* bottom profile stats bar */
div.profile-stats {
  bottom: 0;
  border-top: 1px solid rgba(0,0,0,0.5);
  left: 0;
  padding: 15px 15px 15px 50px;
  position: absolute;
  right: 0;
  z-index: 2;
  background: -moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(0,0,0,0.51) 3%, rgba(0,0,0,0.75) 61%, rgba(0,0,0,0.5) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(3%,rgba(0,0,0,0.51)), color-stop(61%,rgba(0,0,0,0.75)), color-stop(100%,rgba(0,0,0,0.5)));
  background: -webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: -o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: -ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  background: linear-gradient(to bottom,  rgba(255,255,255,0.5) 0%,rgba(0,0,0,0.51) 3%,rgba(0,0,0,0.75) 61%,rgba(0,0,0,0.5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80ffffff', endColorstr='#80000000',GradientType=0 );
}
/* Screenplays and Downloads */
div.profile-stats ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
/* The "number" for screenplays or downloads */
div.profile-stats ul li {
  color: #efefef;
  display: block;
  float: left;
  font-size: 24px;
  font-weight: bold;
  margin-right: 30px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.7)
}
/* the word "screenplays" or the word "downloads" */
div.profile-stats li span {
  display: block;
  font-size: 16px;
  font-weight: normal;
}

/*The "message" button*/
div.profile-stats a.profile-msg {
  display: block;
  float: right; color: #ffffff;
  margin-top: 5px;
  text-decoration: none; 
}

</style>
<script>
            var password = document.getElementById("password"),
                confirm_password = document.getElementById("password_confirmation");
            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
            
            // For Visable input
            document.getElementById('profile_image').onchange = function () {
              	$('#upload-file-info').val($("#profile_image").val());
            };
            
    </script>
@endsection