@extends('admin.index')

@section('content')
<div id="page-wrapper" style="min-height: 341px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add a new user</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form">
                                            <input type="text" hidden name="admin" value="true"/>
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email address</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="username">Username</label>
                                                <input type="text" class="form-control" id="username">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="password">Password</label>
                                                <input type="text" class="form-control" id="password">
                                            </div>
                                            <button type="button" style="width:20%;margin: 0 auto;" class="btn btn-outline btn-primary btn-lg btn-block">Save</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
@endsection