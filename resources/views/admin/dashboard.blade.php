@extends('admin.index')

@section('content')


<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{count($users)}}</div>
                                        <div>New Users!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-globe fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{count($countries)}}</div>
                                        <div>New Countries!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-plane fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{count($cities)}}</div>
                                        <div>New Cities!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-suitcase fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{count($attractions)}}</div>
                                        <div>New Attractions</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Request for approval
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                @if($user->active == "0")
                                                <tr>
                                                    <td><button id="{{$user->id}}" class="btn btn-success inactive" style="width:80px;">Active</button></td>
                                                    <td>{{$user->firstname}}</td>
                                                    <td>{{$user->lastname}}</td>
                                                    <td>{{$user->username}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Users Actions
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-donut-chart"><svg height="347" version="1.1" width="479" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#0b62a4" d="M239.5,286.6666666666667A110.66666666666667,110.66666666666667,0,0,0,343.98523596313163,212.46843260739092" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#0b62a4" stroke="#ffffff" d="M239.5,289.6666666666667A113.66666666666667,113.66666666666667,0,0,0,346.8176670585177,213.45703469614548L391.5071354523873,229.05497876316207A161,161,0,0,1,239.5,337Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3980b5" d="M343.98523596313163,212.46843260739092A110.66666666666667,110.66666666666667,0,0,0,140.2245062356979,127.09716318080183" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#3980b5" stroke="#ffffff" d="M346.8176670585177,213.45703469614548A113.66666666666667,113.66666666666667,0,0,0,137.53330309148487,125.77148386943801L90.58675935354682,102.64574477120273A166,166,0,0,1,396.2278539446975,230.70264891108636Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#679dc6" d="M140.2245062356979,127.09716318080183A110.66666666666667,110.66666666666667,0,0,0,239.4652330418721,286.66666120548564" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#679dc6" stroke="#ffffff" d="M137.53330309148487,125.77148386943801A113.66666666666667,113.66666666666667,0,0,0,239.4642905640915,289.66666105744156L239.4494203591091,336.9999920549685A161,161,0,0,1,95.07209792723518,104.85521029014241Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="239.5" y="166" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-stretch: normal; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(1.7287,0,0,1.7287,-174.5062,-128.9712)" stroke-width="0.5784858182730923"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="239.5" y="186" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(2.3056,0,0,2.3056,-312.803,-232.3889)" stroke-width="0.4337349397590361"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                General
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-donut-chart"><svg height="347" version="1.1" width="479" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#0b62a4" d="M239.5,286.6666666666667A110.66666666666667,110.66666666666667,0,0,0,343.98523596313163,212.46843260739092" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#0b62a4" stroke="#ffffff" d="M239.5,289.6666666666667A113.66666666666667,113.66666666666667,0,0,0,346.8176670585177,213.45703469614548L391.5071354523873,229.05497876316207A161,161,0,0,1,239.5,337Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3980b5" d="M343.98523596313163,212.46843260739092A110.66666666666667,110.66666666666667,0,0,0,140.2245062356979,127.09716318080183" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#3980b5" stroke="#ffffff" d="M346.8176670585177,213.45703469614548A113.66666666666667,113.66666666666667,0,0,0,137.53330309148487,125.77148386943801L90.58675935354682,102.64574477120273A166,166,0,0,1,396.2278539446975,230.70264891108636Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#679dc6" d="M140.2245062356979,127.09716318080183A110.66666666666667,110.66666666666667,0,0,0,239.4652330418721,286.66666120548564" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#679dc6" stroke="#ffffff" d="M137.53330309148487,125.77148386943801A113.66666666666667,113.66666666666667,0,0,0,239.4642905640915,289.66666105744156L239.4494203591091,336.9999920549685A161,161,0,0,1,95.07209792723518,104.85521029014241Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="239.5" y="166" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-stretch: normal; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(1.7287,0,0,1.7287,-174.5062,-128.9712)" stroke-width="0.5784858182730923"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="239.5" y="186" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(2.3056,0,0,2.3056,-312.803,-232.3889)" stroke-width="0.4337349397590361"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
            
            
            <script type="text/javascript">
                //Active user 
                $('.inactive').click(function(e) {
                    var id = $(this).attr("id");
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
            </script>
            
@endsection