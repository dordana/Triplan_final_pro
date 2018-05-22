@extends('layouts.app')
@section('content')
<style type="text/css">
	@import url(//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600);
body, input, .sort {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
}

#sandbox {
  margin: 50px;
}

input {
  border: solid 1px #ccc;
  border-radius: 5px;
  padding: 7px 14px;
  margin-bottom: 10px;
  width: 50%;
}
input:focus {
  outline: none;
  border-color: #aaa;
}

.sort {
  padding: 8px 30px;
  border-radius: 6px;
  border: none;
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background-color: #28a8e0;
  height: 36px;
  float: right;
  margin: 0 5px;
}
.sort:hover {
  text-decoration: none;
  background-color: #1b8aba;
}
.sort:focus {
  outline: none;
}
.sort:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid transparent;
  content: "";
  position: relative;
  top: -10px;
  right: -5px;
}
.sort .asc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #fff;
  content: "";
  position: relative;
  top: 13px;
  right: -5px;
}
.sort .desc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid #fff;
  content: "";
  position: relative;
  top: -10px;
  right: -5px;
}

.list {
  margin: 0;
  padding: 20px 0 0;
}
.list li {
  display: block;
  background-color: #eee;
  padding: 10px;
  box-shadow: inset 0 1px 0 #fff;
  height: 140px;
  margin-bottom: 10px;
}
.list li img {
  float: left;
  padding-right: 20px;
}
.list li h3 {
  font-size: 2em;
  margin: 0 0 0.3rem;
  font-weight: 600;
}
.list li .project-title {
  margin: 0;
  font-weight: 400;
  font-size: 1.5em;
}
.list li .project-label {
  margin: 0;
  font-style: italic;
}
.list li i {
  float: right;
  color: black;
  display: block;
}
.list li i:hover {
  color: #3498db;
}

.grid {
  list-style: none;
}
.grid img {
  float: left;
  padding-right: 20px;
}
.grid li {
  width: 30%;
  display: inline-block;
  background-color: #eee;
  box-shadow: inset 0 1px 0 #fff;
  margin-bottom: 20px;
}
.grid li:nth-of-type(3n+2) {
  margin: 0 20px;
}
.grid li h3 {
  font-size: 2em;
  margin: 0 0 0.3rem;
  font-weight: 600;
}
.grid li .project-title {
  margin: 0;
  font-weight: 400;
  font-size: 1.5em;
}
.grid li .project-label {
  margin: 0;
  font-style: italic;
}
.grid li i {
  float: right;
  margin: 0 10px 0 0;
  color: black;
  display: block;
}
.grid li i:hover {
  color: #3498db;
}

.jscroll {
  height: 700px;
  overflow-y: scroll;
  border: 1px solid black;
}

</style>

<div id="sandbox">
  <input class="search" placeholder="Search" />
  <button class="sort" data-sort="project-name">
    Sort by name
  </button>
  <button class="sort" data-sort="project-username">
    Sort by username
  </button>
  <button class="sort" data-sort="project-city">
    Sort by city
  </button>
  

  <ul class="list" id="list">
  	@foreach($users as $u)
  	<a href="{{route('showuserprofile', $u->id)}}">
	    <li>
    		@if($u->profile_phote_path != "")
			<img style="width:160px; height:120px;" src="{{ url('/uploads/user-photos') }}/{{$u->profile_phote_path}}" />
			@else
			<img style="width:160px; height:120px;" src="https://community.smartsheet.com/sites/default/files/default_user.jpg" />
			@endif
			<h3 class="project-name">{{$u->firstname}} {{$u->lastname}}</h3>
			<p class="project-username">{{$u->username}}</p>
			<p class="project-city">{{$u->city}}, {{$u->country}}</p>
	    </li>
	    </a>
    @endforeach
  </ul>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>


<script type="text/javascript">
// List.js set-up and initialisation

var options = {
  valueNames: [ 'project-name', 'project-title', 'project-label' ]
};

var userList = new List('sandbox', options);

</script>
@endsection