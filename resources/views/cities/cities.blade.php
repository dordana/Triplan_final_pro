@extends('layouts.app')

@section('content')

<link href="{!! asset('pages/cities/cities.css') !!}" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" />


<p id="pageName" hidden >Cities</p>

<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					  <br>
					  <br>
					  <br>
						<h3 style="color:black;">Cities</h3>
						<p></p>
					</div>
				</div>
		</div>

    <div class="main-content flex-site-content">
     
      <div class="container cont">
        <div class="row">
          <div class="col-sm-2">
         <br>
      <div class="panel sidebar-card">
        <!-- CATEGORY PANEL -->
        <div class="list-group">
          <div class="small collapse-category-0">
              <a href="javascript:void(0)" class="nav-item catSubFacet_0_1 list-group-item heading" data-update-url="#" data-facet-update="#main-page">Countries</a>
              <a href="javascript:void(0)" class="nav-item catSubFacet_0_1 list-group-item item1 activeItem" countryId="0" data-update-url="#" data-facet-update="#main-page">All</a>
             @foreach($countries as $country)
                <a href="javascript:void(0)" class="nav-item catSubFacet_0_1 list-group-item item1" countryId="{{$country->id}}" data-update-url="#" data-facet-update="#main-page">{{$country->name}}</a>
             @endforeach 
          </div>
        </div>
      </div>
          </div>
          <div class="col-sm-10">
            <br>
                <div class="row listcities">
                   @foreach ($cities as $city)
                  <div class="col-lg-4 col-md-4 cities">
                    <div class="cards">
                    <a class="card" href="{{route('show-citydetalis', $city->name)}}">
                      <input id="country" hidden value="{{$city->country_id}}"/>
                			<span class="card-header" style="background-image: url({{ url('/uploads/cities') }}/{{$city->name}}/{{$city->mainpic}});">
                				<span class="card-title">
                					<h3 class="text-center cityName">{{$city->name}}</h3>
                				</span>
                			</span>
                			<span class="card-summary">
                          {{substr($city->description, 0,120)}}...
                			</span>
                				<span>
                        <button class="btn btn-primary info">More info</button>
                			</span>
                		</a>
                		</div>
                  </div>
                  @endforeach
                </div>
          </div>
      </div>
    </div>
  </div>
  
  <br><br><br>
<script type="text/javascript">
 
  ///filter by continent
  $('.item1').click(function(){
    $('.item1').each(function(i, element){
      $(this).removeClass('activeItem');
    });
    $(this).toggleClass('activeItem');
    
    var countryId = $(this).attr('countryId');
    $('.listcities').children().each(function(i, element){
      var countryCityId = $(this).find('#country').val();
      if (countryId.trim() == '0'){
        $(this).show();
      }else{
        if (countryId.trim() != countryCityId.trim()) {
          $(this).hide();
        }else{
          $(this).show();
        }
      }
    });
  });
  
 
    
</script>
<script src="{!! asset('pages/cities/cities.js') !!}"></script>	
@endsection