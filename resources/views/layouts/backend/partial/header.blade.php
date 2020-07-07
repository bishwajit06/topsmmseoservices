<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{route('admin.dashboard')}}" class="logo"><b>TOP <span>SMM</span></b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <ul class="nav top-menu">
            <li><a href="{{route('home')}}" class="btn">Website</a></li>
        </ul>
    </div>
    <div></div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <a class="logout" href="{{route('logout')}}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</header>
