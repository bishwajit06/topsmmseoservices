<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p>
                <a class="centered" href="{{ route('admin.profile.index') }}" style="text-align: -webkit-center;">
                    @if (auth()->user()->image)
                    <img class="centered img-circle" src="{{ asset('storage/profile/'.auth()->user()->image) }}" alt="{{auth()->user()->first_name}}" width="80" />
                    @else
                    <img class="img-circle" src="{{asset('assets/images/avator.png')}}" alt="{{auth()->user()->first_name}}" width="80" />
                    @endif
                </a>
            </p>
            <br>
            <h5 class="centered">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
            @if(Request::is('admin*'))
            <li class="mt">
                <a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/user*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span>User</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/user') ? 'active' : '' }}"><a href="{{route('admin.user.index')}}">Manage Users</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/gallery*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-upload"></i>
                    <span>Gallery</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/gallery') ? 'active' : '' }}"><a href="{{route('admin.gallery.index')}}">Manage Gallery</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('admin/category*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Category</span>
                </a>
                <ul class="sub">
                    <li class="{{Request::is('admin/category') ? 'active' : ''}}"><a href="{{route('admin.category.index')}}">Manage Categories</a></li>
                    <li class="{{Request::is('admin/category/create') ? 'active' : ''}}"><a href="{{route('admin.category.create')}}">Add Category</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/tag*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-list-alt"></i>
                    <span>Tag</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/tag') ? 'active' : '' }}"><a href="{{route('admin.tag.index')}}">Manage Tag</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('admin/service*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-rocket"></i>
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
                <a class="{{ Request::is('admin/page*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-file-text-o"></i>
                    <span>Page</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/page') ? 'active' : '' }}"><a href="{{route('admin.page.index')}}">Manage Pages</a></li>
                    <li class="{{ Request::is('admin/page/create') ? 'active' : '' }}"><a href="{{route('admin.page.create')}}">Add Page</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/post*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-clipboard"></i>
                    <span>Post</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/post') ? 'active' : '' }}"><a href="{{route('admin.post.index')}}">Manage Posts</a></li>
                    <li class="{{ Request::is('admin/post/create') ? 'active' : '' }}"><a href="{{route('admin.post.create')}}">Add Post</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/comment*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Comment</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/comment') ? 'active' : '' }}"><a href="{{route('admin.comment.index')}}">Manage Comments</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/slider*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-chain"></i>
                    <span>Slider</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/slider') ? 'active' : '' }}"><a href="{{route('admin.slider.index')}}">Manage sliders</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/menu*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-bookmark"></i>
                    <span>Menu</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/menu') ? 'active' : '' }}"><a href="{{route('admin.menu')}}">Manage Menu</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="{{ Request::is('admin/division*') ? 'active' : '' }} {{ Request::is('admin/district*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-map-marker"></i>
                    <span>Location</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/division') ? 'active' : '' }}"><a href="{{route('admin.division.index')}}">Manage Divisions</a></li>
                    <li class="{{ Request::is('admin/district') ? 'active' : '' }}"><a href="{{route('admin.district.index')}}">Manage Districts</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('admin/profile*') ? 'active' : '' }} {{ Request::is('admin/setting*') ? 'active' : '' }} {{ Request::is('admin/social*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Setting</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/setting*') ? 'active' : '' }}"><a href="{{route('admin.setting.index')}}">Home Setting</a></li>
                    <li class="{{ Request::is('admin/social*') ? 'active' : '' }}"><a href="{{route('admin.social.index')}}">Social Media</a></li>
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
            @endif
            @if(Request::is('author*'))
            <li class="mt">
                <a class="{{ Request::is('author/dashboard') ? 'active' : '' }}" href="{{route('author.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('author/post*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-clipboard"></i>
                    <span>Post</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('author/post') ? 'active' : '' }}"><a href="{{route('author.post.index')}}">Manage Posts</a></li>
                    <li class="{{ Request::is('author/post/create') ? 'active' : '' }}"><a href="{{route('author.post.create')}}">Add Post</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('author/profile*') ? 'active' : '' }}" href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Setting</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('author/profile*') ? 'active' : '' }}"><a href="{{route('author.profile.index')}}">Manage Profile</a></li>
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

            @endif
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
