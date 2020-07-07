<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="{{ route('admin.profile.index') }}">
                    @if (auth()->user()->image)
                    <img class="img-circle" src="{{ asset('storage/profile/'.auth()->user()->image) }}" alt="{{auth()->user()->first_name}}" width="80" />
                    @else
                    <img class="img-circle" src="{{asset('assets/images/avator.png')}}" alt="{{auth()->user()->first_name}}" width="80" />
                    @endif
                </a>
            </p>
        <h5 class="centered">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
            <li class="mt">
                <a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/category*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Category</span>
                </a>
                <ul class="sub">
                    <li class="{{Request::is('admin/category') ? 'active' : ''}}"><a href="{{route('admin.category.index')}}">Manage Categories</a></li>
                    <li class="{{Request::is('admin/category/create') ? 'active' : ''}}"><a href="{{route('admin.category.create')}}">Add Category</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/tag*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Tag</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/tag') ? 'active' : '' }}"><a href="{{route('admin.tag.index')}}">Manage Tag</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/service*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Service</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/service') ? 'active' : '' }}"><a href="{{route('admin.service.index')}}">Manage Services</a></li>
                    <li class="{{ Request::is('admin/service/create') ? 'active' : '' }}"><a href="{{route('admin.service.create')}}">Add Service</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/review*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Review</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/review') ? 'active' : '' }}"><a href="{{route('admin.review.index')}}">Manage Reviews</a></li>
                    <li class="{{ Request::is('admin/review/create') ? 'active' : '' }}"><a href="{{route('admin.review.create')}}">Add Review</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/order*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Order</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/order*') ? 'active' : '' }}"><a href="{{route('admin.order.index')}}">Manage Orders</a></li>
                    <li class="{{ Request::is('admin/order/create*') ? 'active' : '' }}"><a href="{{route('admin.order.create')}}">Add Order</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/slider*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Slider</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/slider') ? 'active' : '' }}"><a href="{{route('admin.slider.index')}}">Manage sliders</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/menu*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Menu</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/menu') ? 'active' : '' }}"><a href="{{route('admin.menu')}}">Manage Menu</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/division*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-map-marker"></i>
                    <span>Division</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/division') ? 'active' : '' }}"><a href="{{route('admin.division.index')}}">Manage Divisions</a></li>
                    <li class="{{ Request::is('admin/division/create') ? 'active' : '' }}"><a href="{{route('admin.division.create')}}">Add Division</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/district*') ? 'active' : '' }}" href="javascript:;">
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>District</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/district') ? 'active' : '' }}"><a href="{{route('admin.district.index')}}">Manage Districts</a></li>
                    <li class="{{ Request::is('admin/district/create') ? 'active' : '' }}"><a href="{{route('admin.district.create')}}">Add District</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/profile*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Setting</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/profile*') ? 'active' : '' }}"><a href="{{route('admin.profile.index')}}">Manage Profile</a></li>
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
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
