@extends('layouts.app')

@section('content')

<link href="{!! asset('pages/countries/countries.css') !!}" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" />
<p id="pageName" hidden >Countries</p>


    <div class="main-content flex-site-content">
     
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
         <br>
      <div class="panel panel-default sidebar-card">
        <!-- CATEGORY PANEL -->
        <div class="panel-heading">
          <h3 class="panel-title">Continents</h3>
        </div>
        <div class="list-group">
          <div class="small collapse-category-0">
            <a href="javascript:void(0)" class="nav-item catSubFacet_0_1 list-group-item item1" data-update-url="#" data-facet-update="#main-page">All</a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_0_1 list-group-item item1" data-update-url="#" data-facet-update="#main-page">Asia </a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_1_1 list-group-item item1" data-update-url="#" data-facet-update="#main-page">North America </a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_1_2 list-group-item item1" data-update-url="#" data-facet-update="#main-page">Africa </a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_1_3 list-group-item item1" data-update-url="#" data-facet-update="#main-page">Australia</a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_1_4 list-group-item item1" data-update-url="#" data-facet-update="#main-page">Europe </a>
            <a href="javascript:void(0)" class="nav-item catSubFacet_1_5 list-group-item item1" data-update-url="#" data-facet-update="#main-page">South America </a>
          </div>
        </div>
      </div>
          </div>
          <div class="col-sm-9">
            <br>
            <div class="container">
                <div class="row dddd">
                  @foreach ($countries as $country)
                  <div class="col-lg-4 col-md-4 countries">
                    <div class="cards">
                    <a class="card" href="{{route('show-countrydetalis', $country->name)}}">
                      <input id="continent" hidden value="{{$country->continent}}"/>
                      <input id="currency" hidden value="GBP"/>
                			<span class="card-header" style="background-image: url({{ url('/uploads/countries') }}/{{$country->mainpic}});">
                				<span class="card-title">
                					<h3 class="text-center">{{$country->name}}</h3>
                				</span>
                			</span>
                			<span class="card-summary">
                          {{substr($country->description, 0,120)}}...
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
  </div>
<script type="text/javascript">
 
  ///filter by continent
  $('.item1').click(function(){
    
  	var ch = $(this).text();
  	$('.dddd').children().each(function(i, element){
          var a = $(this).find('#continent').val();
          if (ch.trim() == 'All'){
            $(this).show();
          }else{
            if (ch.trim() != a.trim()) {
              $(this).hide();
            }else{
              $(this).show();
            }
          }
      });
  });
  
 
    
</script>
<script src="{!! asset('pages/countries/countries.js') !!}"></script>	
@endsection