@extends('admin.index')

@section('content')
<!-- DataTables CSS -->
<link href="/admin/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/admin/css/dataTables/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


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
                                                    <input class="form-control">
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
                                            <tr class="gradeC odd" role="row">
                                                <td class="center">{{$user->id}}</td>
                                                <td class="center">{{$user->admin}}</td>
                                                <td class="center">{{$user->provider_id}}</td>
                                                <td class="center">{{$user->provider}}</td>
                                                <td class="center">{{$user->profile_phote_path}}</td></td>
                                                <td class="center">{{$user->firstname}}</td>
                                                <td class="center">{{$user->lastname}}</td></td>
                                                <td class="center">{{$user->username}}</td>
                                                <td class="center">{{$user->num_of_shares}}</td></td>
                                                <td class="center">{{$user->num_of_likes}}</td>
                                                <td class="center">{{$user->num_of_paths}}</td>
                                                <td class="center">{{$user->date_of_birth}}</td></td>
                                                <td class="center">{{$user->age}}</td>
                                                <td class="center">{{$user->gender}}</td>
                                                <td class="center">{{$user->country}}</td>
                                                <td class="center">{{$user->city}}</td>
                                                <td class="center">{{$user->rate}}</td>
                                                <td class="center">{{$user->active}}</td>
                                                <td class="center">{{$user->email}}</td>
                                                <td class="center">{{$user->password}}</td>
                                                <td class="center">{{$user->remember_token}}</td>
                                                <td class="center">{{$user->created_at}}</td>
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
         <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
                
            });
        </script>
@endsection