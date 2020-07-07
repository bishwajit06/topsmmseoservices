<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach (App\Category::all() as $categoryMenu)
      <li class="dropdown menu-item">
      <a href="{{ route('category.show',$categoryMenu->slug)}}">
          <img style="height: 14px" src="{{ asset('storage/category/icon/'.$categoryMenu->icon_image)}}" alt="">{{ ' '.' '.$categoryMenu->name}}
            </a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->
        @endforeach
      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
  <!-- /.side-menu -->
