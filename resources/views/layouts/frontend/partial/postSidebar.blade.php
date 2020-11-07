<div class="col-md-3 sidebar">
    <div class="sidebar-module-container">
        <div class="search-area outer-bottom-small">
            <form>
                <div class="control-group">
                    <input placeholder="Type to search" class="search-field">
                    <a href="#" class="search-button"></a>
                </div>
            </form>
        </div>

    <!-- ==============================================CATEGORY=========================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Blog Categories</div>
        <nav class="yamm megamenu-horizontal">
          <ul class="nav">
            @foreach (App\Category::all() as $categoryMenu)
          <li class="dropdown menu-item">
          <a href="{{ route('postCategory.show',$categoryMenu->slug)}}">
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
    <!-- ========================= CATEGORY : END ===================================== -->



        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <h3 class="section-title">tab widget</h3>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                <li><a href="#recent" data-toggle="tab">recent post</a></li>
            </ul>
            <div class="tab-content" style="padding-left:0">
                <div class="tab-pane active m-t-20" id="popular">

                    @foreach (App\Post::latest()->take('2')->get() as $popularPost)
                    <div class="blog-post inner-bottom-30 " >
                        @if ($popularPost->image)
                            <img class="img-responsive" src=" {{asset('storage/post/'.$popularPost->image)}} " alt="">
                        @else
                            <img class="img-responsive" src=" {{asset('assets/backend/img/demo_image.png')}} " alt="">
                        @endif
                            <h4><a href="{{ route('post.details',$popularPost->slug)}}"> {{ $popularPost->title }} </a></h4>
                            <span class="review">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($popularPost->comments as $comment)
                                    @if ($comment->approve == 0)
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                echo $i;
                                @endphp Comments
                            </span>
                        <span class="date-time">{{ $popularPost->created_at->diffForHumans() }}</span>
                        <p>{!!  substr(strip_tags($popularPost->body), 0, 55) !!}</p>
                        <a href="{{ route('post.details',$popularPost->slug)}}"> More Details</a>

                    </div>
                    @endforeach
                </div>

                <div class="tab-pane m-t-20" id="recent">
                    @foreach (App\Post::take('2')->inRandomOrder()->get() as $recentPost)
                    <div class="blog-post inner-bottom-30 " >
                        @if ($recentPost->image)
                            <img class="img-responsive" src=" {{asset('storage/post/'.$recentPost->image)}} " alt="">
                        @else
                            <img class="img-responsive" src=" {{asset('assets/backend/img/demo_image.png')}} " alt="">
                        @endif
                            <h4><a href="{{ route('post.details',$recentPost->slug)}}"> {{ $recentPost->title }} </a></h4>
                            <span class="review">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($recentPost->comments as $comment)
                                    @if ($comment->approve == 0)
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                                @php
                                echo $i;
                                @endphp Comments
                            </span>
                        <span class="date-time">{{ $recentPost->created_at->diffForHumans() }}</span>
                        <p>{!!  substr(strip_tags($recentPost->body), 0, 55) !!}</p>
                        <a href="{{ route('post.details',$recentPost->slug)}}"> More Details</a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ================================== PRODUCT TAGS ================================= -->
        <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Blog tags</h3>
            <div class="sidebar-widget-body">
              <div class="tag-list">
                    @foreach (App\Tag::latest()->get() as $tag)
                    <a class="item" title="Facebook" href="{{ route('postTag.show',$tag->slug)}}"> {{ $tag->name}}  </a>
                    @endforeach
                </div>
              <!-- /.tag-list -->
            </div>
            <!-- /.sidebar-widget-body -->
          </div>
          <!-- /.sidebar-widget -->
        <!-- =========================== PRODUCT TAGS : END ===================== -->
    </div>
</div>
