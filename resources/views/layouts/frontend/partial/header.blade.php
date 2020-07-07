
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
		<div class="pull-left m-t-10">
			<p>Email: support@topsmmseoservices | Contact: +8801916003132</p>
		</div>
        <div class="cnt-account">
		  <ul class="list-unstyled">
			<li><a href="{{ route('faq')}}"><i class="icon fa fa-user"></i>FAQ</a></li>
            <li><a href="{{ route('terms-conditions')}}"><i class="icon fa fa-user"></i>Terms & Condition</a></li>
			@guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ __(' Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}"><i class="icon fa fa-check"></i>{{ __(' Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><i class="icon fa fa-user"></i> &nbsp{{Auth::user()->first_name }} {{Auth::user()->last_name }} </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->role_id ==1)
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    @else
                                    <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->
        <div class="logo"> <a href="{{ route('home')}}"> <img src="{{ asset('assets/images/logo.png')}}" alt="logo"> </a> </div>
          <!-- /.logo -->
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
          <!-- /.contact-row -->
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="head-main-title">
            <h3>SOCIAL MEDIA MARKETING AND SEO SERVICES</h3>
          </div>
          <!-- /.search-area -->
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
          <a href="https://www.fiverr.com/tanushriroy19" target="_blank" class="btn btn-info-head btn-lg pull-right">Order To Fiverr</a>
		</div>
        <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
                @if($public_menu)
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : '' }} dropdown yamm-fw">
                        <a href="{{ route('home')}}">Home</a>
                    </li>
                    @foreach($public_menu as $menu)
                    <li class="{{ $menu['child'] ? 'dropdown' : '' }}">
                        <a class="{{ $menu['child'] ? 'dropdown-toggle' : '' }}"  href="{{ $menu['link'] }}" data-hover="{{ $menu['child'] ? 'dropdown' : '' }}" data-toggle="{{ $menu['child'] ? 'dropdown' : '' }}" title="">{{ $menu['label'] }}</a>                 <ul class="dropdown-menu pages">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                    <div class="col-xs-12 col-menu">
                                        @if( $menu['child'] )
                                            <ul class="links">
                                                @foreach( $menu['child'] as $child )
                                                    <li class=""><a href="{{ $child['link'] }}" title="">{{ $child['label'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                    <li class="dropdown  navbar-right">
                        <a style="border:1px solid #D0205E" href="https://www.freelancer.com/u/roytanushri13" target="_blank" class="btn btn-primary">Hire to Freelancer</a>
                    </li>
                </ul>
                @endif
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->

  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
