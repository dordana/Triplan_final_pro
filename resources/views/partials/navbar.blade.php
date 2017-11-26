<style type="text/css">
    .navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
</style>


<header class="head-section" >
      <div class="navbar navbar-default navbar-static-top container" >
          <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Tri<span>P</span>lan</a>
          </div>
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover="dropdown" data-toggle="dropdown" href="#">Feature <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="typography.html">Typography</a>
                          </li>
                          <li>
                              <a href="button.html">Buttons</a>
                          </li>
                          <li>
                              <a href="form.html">Form</a>
                          </li>
                          <li>
                              <a href="table.html">Table</a>
                          </li>
                          <li class="dropdown-submenu">
                              <a href="#" tabindex="-1">More options</a>
                              <ul class="dropdown-menu">
                                  <li>
                                      <a href="#" tabindex="-1">Second level</a>
                                  </li>
                                  <li class="dropdown-submenu">
                                      <a href="#">Even More..</a>
                                      <ul class="dropdown-menu">
                                          <li>
                                              <a href="#">3rd level</a>
                                          </li>
                                          <li>
                                              <a href="#">3rd level</a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="#">Second level</a>
                                  </li>
                                  <li>
                                      <a href="#">Second level</a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover="dropdown" data-toggle="dropdown" href="#">Pages <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="about.html">About</a>
                          </li>
                          <li>
                              <a href="404.html">404 page</a>
                          </li>
                          <li>
                              <a href="career.html">career</a>
                          </li>
                          <li>
                              <a href="login.html">Login</a>
                          </li>
                          <li>
                              <a href="registration.html">Registration</a>
                          </li>
                          <li>
                              <a href="faq.html">FAQ</a>
                          </li>
                          <li class="dropdown-submenu">
                              <a href="#" tabindex="-1">Pricing table</a>
                              <ul class="dropdown-menu">
                                  <li class="dropdown-submenu"></li>
                                  <li>
                                      <a href="price-table-one.html">Pricing table one</a>
                                  </li>
                                  <li>
                                      <a href="price-table-two.html">Pricing table two</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="service.html">Service</a>
                          </li>
                          <li>
                              <a href="terms.html">Terms &amp; Condition</a>
                          </li>
                          <li>
                              <a href="privacy.html">Privacy policy</a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover="dropdown" data-toggle="dropdown" href="#">Portfolio <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="portfolio-3-col.html">Portfolio 3 column</a>
                          </li>
                          <li>
                              <a href="portfolio-4-col.html">Portfolio 4 column</a>
                          </li>
                          <li>
                              <a href="portfolio-single-image.html">Portfolio Single Image</a>
                          </li>
                          <li>
                              <a href="portfolio-single-video.html">Portfolio Single Video</a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover="dropdown" data-toggle="dropdown" href="#">Blog <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="blog.html">Blog</a>
                          </li>
                          <li>
                              <a href="blog-two-col.html">Blog two column</a>
                          </li>
                          <li>
                              <a href="blog-detail.html">Blog Single Image</a>
                          </li>
                          <li>
                              <a href="blog-detail-video.html">Blog single video</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="contact.html">Contact</a>
                  </li>
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>{{ Auth::user()->firstname . " " .Auth::user()->lastname  }}</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu" style="left:-70px;">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        @if(Auth::user()->profile_phote_path)
                                            <img src="/uploads/user-photos/{{ Auth::user()->profile_phote_path }}" style="border:1px solid black;width:110px; height:100px; float:left; border-radius:50%; margin-right:25px;">
                                        @else
                                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" style="border:1px solid black;width:110px; height:100px; float:left; border-radius:50%; margin-right:25px;">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 text-center">
                                        <p class="text-center"><strong>{{ Auth::user()->firstname . " " .Auth::user()->lastname }}</strong></p>
                                        <p class="text-center small">{{ Auth::user()->email }}</p>
                                        <br>
                                        <p>
                                            <a href="{{ url('/profile') }}" class="btn btn-danger btn-block">My account</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="{{ url('/logout') }}" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><input class="form-control search" placeholder=" Search" type="text"></li>
                @endif
              </ul>
          </div>
      </div>
    </header>
