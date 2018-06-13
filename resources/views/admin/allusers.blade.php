@extends('admin.index')

@section('content')
<!-- DataTables CSS -->
<link href="/admin/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/admin/css/dataTables/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style type="text/css">
    input { width:100%; height:100%; }
</style>

<div id="page-wrapper" style="min-height: 842px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Entities</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                User table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Search:</label>
                                                    <input id="searchtext" class="form-control">
                                                    <button class="btn btn-primary searchBtn" title="Username, Fullname, Lasrname or Id">Search</button>
                                                </div>
                                            </div>
                                        </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <style type="text/css">
                                        table {
                                            width: 100%;
                                            display:block;
                                            overflow-x: auto;
                                        }
                                    </style>
                                    <table border="1"  width="100%" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr role="row">
                                                <th>
                                                Actions
                                                </th>
                                                <th>
                                                Id
                                                </th>
                                                <th>
                                                Admin
                                                </th>
                                                <th>
                                                Provider_id
                                                </th>
                                                <th>
                                                Provider
                                                </th>
                                                <th>
                                                Profile_phote_path
                                                </th>
                                                <th>
                                                Firstname
                                                </th>
                                                <th>
                                                Lastname
                                                </th>
                                                <th >
                                                Username
                                                </th>
                                                <th>
                                                num_of_shares
                                                </th>
                                                <th>
                                                num_of_likes
                                                </th>
                                                <th>
                                                Num_of_paths
                                                </th>
                                                <th>
                                                Date_of_birth
                                                </th>
                                                <th>
                                                Age
                                                </th>
                                                <th>
                                                Gender
                                                </th>
                                                <th>
                                                Country
                                                </th>
                                                <th>
                                                City
                                                </th>
                                                <th>
                                                Rate
                                                </th>
                                                <th>
                                                Active
                                                </th>
                                                <th>
                                                Email
                                                </th>
                                                <th>
                                                Password
                                                </th>
                                                <th>
                                                Token
                                                </th>
                                                <th>
                                                Created at
                                                </th>
                                                <th>
                                                Update at
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr class="gradeC odd trData" role="row" id="{{$user->id}}">
                                                <td class="center actions">
                                                    @if($user->active == "1")
                                                    <button class="btn btn-success inactive" style="width:80px;">Active</button>
                                                    @else
                                                    <button class="btn btn-danger active" style="width:80px;">Inactive</button>
                                                    @endif
                                                </td>
                                                <td class="center userid">{{$user->id}}</td>
                                                <td class="center useradmin" type="admin" contenteditable='true'>{{$user->admin}}</td>
                                                <td class="center ">{{$user->provider_id}}</td>
                                                <td class="center ">{{$user->provider}}</td>
                                                <td class="center"><img style="width:150; height:80px;" src="{{ url('/uploads/user-photos') }}/{{$user->profile_phote_path}}" alt="{{ url('/uploads/Icons/userprofile.png') }}"/></td>
                                                <td class="center userfullname" type="firstname" contenteditable='true'>{{$user->firstname}}</td>
                                                <td class="center userlastname" type="lastname" contenteditable='true'>{{$user->lastname}}</td>
                                                <td class="center" contenteditable='username' type="username">{{$user->username}}</td>
                                                <td class="center" contenteditable='true' type="num_of_shares">{{$user->num_of_shares}}</td>
                                                <td class="center" contenteditable='true' type="num_of_likes">{{$user->num_of_likes}}</td>
                                                <td class="center" contenteditable='true' type="num_of_paths">{{$user->num_of_paths}}</td>
                                                <td class="center" contenteditable='true'  type="date_of_birth">{{$user->date_of_birth}}</td>
                                                <td class="center" contenteditable='true' type="age">{{$user->age}}</td>
                                                <td class="center" contenteditable='true' type="gender">{{$user->gender}}</td>
                                                <td class="center" contenteditable='true' type="country">{{$user->country}}</td>
                                                <td class="center" contenteditable='true' type="city">{{$user->city}}</td>
                                                <td class="center" contenteditable='true'  type="rate">{{$user->rate}}</td>
                                                <td class="center" contenteditable='true' type="active">{{$user->active}}</td>
                                                <td class="center" contenteditable='true' type="email">{{$user->email}}</td>
                                                <td class="center" >{{$user->password}}</td>
                                                <td class="center" >{{$user->remember_token}}</td>
                                                <td class="center" >{{$user->created_at}}</td>
                                                <td class="center">{{$user->updated_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <script src="/admin/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="/admin/js/dataTables/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".searchBtn").click(function(){
                   var searchValue = $("#searchtext").val();
                   if(searchValue != ""){
                       $(".trData").fadeOut("slow");
                       $(".trData").each(function() {
                           var userId = $(this).find(".userid").text().toLowerCase();
                           var fullname = $(this).find(".userfullname").text().toLowerCase();
                           var lastname = $(this).find(".userlastname").text().toLowerCase();
                           var username = $(this).find(".username").text().toLowerCase();
                           if(userId.includes(searchValue.toLowerCase()) || fullname.includes(searchValue.toLowerCase()) || lastname.includes(searchValue.toLowerCase()) || username.includes(searchValue.toLowerCase())){
                               $(this).fadeIn("slow");
                           }
    			        });
                   }else{
                       $(".trData").fadeIn("slow");
                   }
                });
                
                //Edit
                $('table td').keyup(function(e) {
                    var id = $(this).parent().attr("id");
                    var type = $(this).attr("type");
                    clearTimeout($.data(this, 'timer'));
                    var wait = setTimeout(function(){
                    console.log(e.currentTarget.innerHTML,id,type);
                    var url = 'user/edit';
                    $.ajaxSetup({
        				headers: {
        					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        				}
        			});
                    $.ajax({
                    	type: 'ajax',
                    	method: 'post',
                    	url: url,
                    	data: {type:type,id:id,value:e.currentTarget.innerHTML},
                    	async: false,
                    	dataType: 'json',
                    	success: function(data){
                    	    console.log(data);
                    	},
                    	error: function(data){
                    		console.log(data);
                    	}
                    });
                    }, 500); // delay after user types
                    $(this).data('timer', wait);
                });
                
                
                //Active user 
                $('.inactive').click(function(e) {
                    var id = $(this).parent().parent().attr("id");
                    var url = 'user/inactive';
                    $.ajaxSetup({
        				headers: {
        					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        				}
        			});
                    $.ajax({
                    	type: 'ajax',
                    	method: 'post',
                    	url: url,
                    	data: {id:id},
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
                
                
                //inActive user 
                $('.active').click(function(e) {
                    var id = $(this).parent().parent().attr("id");
                    var url = 'user/active';
                    $.ajaxSetup({
        				headers: {
        					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        				}
        			});
                    $.ajax({
                    	type: 'ajax',
                    	method: 'post',
                    	url: url,
                    	data: {id:id},
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
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                $('#dataTables-example').DataTable({
                        responsive: true
                });
                
            });
        </script>
@endsection