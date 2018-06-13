        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">ADMIN PANEL</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="/"><i class="fa fa-home fa-fw"></i> Back to Triplan site</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{Auth::user()->username}} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="/admin/dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <!--Users-->
                            <li>
                                <a class="option" href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level" style="display: none;">
                                    <li>
                                        <a href="/admin/allusers"><i class="fa fa-users"></i>  Show all users</a>
                                    </li>
                                    <li>
                                        <a href="/admin/adduser"><i class="fa fa-user-plus"></i>  Add a new user</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--end Users-->
                            <!--Countries-->
                            <li>
                                <a class="option" href="#"><i class="fa fa-globe fa-fw"></i> Countries<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level" style="display: none;">
                                    <li>
                                        <a href="flot.html"><i class="fa fa-eye"></i>  Show all countries</a>
                                    </li>
                                    <li>
                                        <a href="morris.html"><i class="fa fa-plus"></i>  Add a new country</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--end Countries-->
                            <!--Cities-->
                            <li>
                                <a class="option" href="#"><i class="fa fa-plane fa-fw"></i> Cities<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level" style="display: none;">
                                    <li>
                                        <a href="flot.html"><i class="fa fa-eye"></i>  Show all cities</a>
                                    </li>
                                    <li>
                                        <a href="morris.html"><i class="fa fa-plus"></i>  Add a new city</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--end cities-->
                            <!--Attractions-->
                            <li>
                                <a class="option" href="#"><i class="fa fa-suitcase fa-fw"></i> Attractions<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level" style="display: none;">
                                    <li>
                                        <a href="flot.html"><i class="fa fa-eye"></i>  Show all attractions</a>
                                    </li>
                                    <li>
                                        <a href="morris.html"><i class="fa fa-plus"></i>  Add a new attraction</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--end Attractions-->
                            <!--Reviews-->
                            <li>
                                <a class="option" href="#"><i class="fa fa-newspaper-o fa-fw"></i> Reviews<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level" style="display: none;">
                                    <li>
                                        <a href="flot.html"><i class="fa fa-eye"></i>  Show all reviews</a>
                                    </li>
                                    <li>
                                        <a href="morris.html"><i class="fa fa-plus"></i>  Add a new review</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--end Reviews-->
                        </ul>
                    </div>
                </div>
            </nav>
            
            <script type="text/javascript">
                $(".option").click(function(){
                   $(this).next(".nav-second-level").toggleClass("show");
                });
            </script>