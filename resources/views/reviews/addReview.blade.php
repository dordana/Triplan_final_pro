@extends('layouts.app')

@section('content')
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style type="text/css">
	body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 100%;
  margin: 0 auto 20px auto;
  
}
input::-webkit-inner-spin-button, 
input::-webkit-outer-spin-button,
input::-webkit-calendar-picker-indicator{ 
  -webkit-appearance: none; 
  margin: 0; 
  cursor:pointer;
}
.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #f78536;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #f78536;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #f78536;
  color: white;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px solid #f78536;
  position: relative;
}

.image-dropping {
  background-color: #f78536;
  border: 4px solid #ffffff;
  color: white;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #f78536;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
.file-upload-input:hover{
	color: white !important;
}
</style>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" enctype="multipart/form-data" method="POST" action="{{ url('/addreview') }}" autocomplete="off">
		                {{ csrf_field() }}
				<span class="contact100-form-title">
    				Add a new review
				</span>

                <div class="wrap-input100 input100-select bg0">
					<span class="label-input100">Type: </span>
					<div>
						<select class="js-select2" name="type_of_R">
							<option value="review">Review</option>
							<option value="recommendation" >Recommendation</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="wrap-input100 validate-input bg0" data-validate="Please Type Your title">
					<span class="label-input100">Title:</span>
					<input class="input100" type="text" name="title" placeholder="Enter Your title">
				</div>
                
                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your body">
					<span class="label-input100">Body:</span>
					<textarea class="input100" name="body" placeholder="Enter Your body"></textarea>
				</div>
				
				<div class="wrap-input100 input100-select bg0">
					<span class="label-input100">About: </span>
					<div>
						<select class="js-select2 selectCountry" name="kind_of">
						    <option>---</option>
							<option value="country">Country</option>
							<option value="city">City</option>
							<option value="attraction">Attraction</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
                <div hidden class="wrap-input100 input100-select bg0 optionsDiv">
					<span class="label-input100">About: </span>
					<div>
						<select class="js-select2 options" name="kind_id">
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
			
				<div class="wrap-input100 validate-input bg0" data-validate="Please Type Your title">
					<span class="label-input100">Start date:</span>
					<input class="input100" type="date" name="startDate">
				</div>
				<div class="wrap-input100 validate-input bg0" data-validate="Please Type Your title">
					<span class="label-input100">End date:</span>
					<input class="input100" type="date" name="endDate">
				</div>
				
					<div class="file-upload">
					  <div class="image-upload-wrap">
					    <input class="file-upload-input" type='file'  name="photos[]" accept="image/*" multiple />
					    <div class="drag-text">
					      <h3 class="image-upload-text">Select images</h3>
					    </div>
					  </div>
					</div>

				<div class="w-full js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Type of visit:</span>
						
						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="type" value="couple">
							<label class="label-radio100" for="radio1">
								Couple
							</label>
						</div>
						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="type" value="family">
							<label class="label-radio100" for="radio2">
								Family
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="type" value="friends">
							<label class="label-radio100" for="radio3">
								Friends
							</label>
						</div>
						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio4" type="radio" name="type" value="business">
							<label class="label-radio100" for="radio4">
								Business
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio5" type="radio" name="type" value="solo">
							<label class="label-radio100" for="radio5">
								Solo
							</label>
						</div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			
		});
		var countries = {!! json_encode($countries->toArray()) !!};
		var cities = {!! json_encode($cities->toArray()) !!};
		var attractions = {!! json_encode($attractions->toArray()) !!};
		
		$(".selectCountry").change(function(){
		
		    var optionsHTML = "";
		    if($(this).val() == "---"){
		        $(".optionsDiv").hide();
		    }
		    else if($(this).val() == "country"){
		        for(var i in countries){
		            optionsHTML += "<option value="+countries[i].id+">"+countries[i].name+"</option>"
		        }
		        $(".options").html(optionsHTML);
		        $(".optionsDiv").removeAttr('hidden');
		        $(".optionsDiv").show();
		    }
		    else if($(this).val() == "city"){
		        for(var i in cities){
		            optionsHTML += "<option value="+cities[i].id+">"+cities[i].name+"</option>"
		        }
		        $(".options").html(optionsHTML);
		        $(".optionsDiv").removeAttr('hidden');
		        $(".optionsDiv").show();
		    }else if($(this).val() == "attraction"){
		    for(var i in attractions){
		            optionsHTML += "<option value="+attractions[i].id+">"+attractions[i].name+"</option>"
		        }
		        $(".options").html(optionsHTML);
		        $(".optionsDiv").removeAttr('hidden');
		        $(".optionsDiv").show();
		    }
		})
		
		
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->

<script type="text/javascript" >
$('input[type="file"]').click(function(e){
	$('.image-upload-text').text('Wait please!');
});

$('input[type="file"]').change(function(e){
    $('.image-upload-text').text('\u2713 Uploaded successfully!');
});

</script>
<!---->
	<script src="js/main.js"></script>

@endsection