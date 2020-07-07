@extends('layouts.frontend.master')
@section('title')
Home | Online Social media Market
@endsection
@push('css')


@endpush
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row">
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

            <!-- ========================================== SECTION – HERO ========================================= -->

            @include('layouts.frontend.partial.slider')

            <!-- ========================================= SECTION – HERO : END ========================================= -->

          <!-- ============================================== INFO BOXES ============================================== -->
          <div class="info-boxes wow fadeInUp">
            <div style="background-color: #d0205e;padding: 1px;" class="info-boxes-inner">
              <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                <!-- .col -->

                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Real Services</h4>
                      </div>
                    </div>
                    <h6 class="text">Real no fack services </h6>
                  </div>
                </div>
                <!-- .col -->

                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Offer</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra $5 off on all items </h6>
                  </div>
                </div>
                <!-- .col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->

          </div>
          <!-- /.info-boxes -->
          <!-- ============================================== INFO BOXES : END ============================================== -->

          <!-- ============================================== ALL CATEGORIES ============================================== -->

          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">All Categories</h3>
              <a href="#" class="btn btn-primary pull-right">Order To Freelancer</a>
              <!-- /.nav-tabs -->
            </div>
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-sm-4 col-md-3 wow fadeInUp">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{route('category.show',$category->slug)}}">
                                            @if ($category->thumbnail_image)
                                            <img  src="{{ asset('storage/category/thumbnail/'.$category->thumbnail_image) }}" alt="{{ $category->name }}"></a>
                                            @else
                                                <img style="height: 40px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                            @endif
                                        </div>
                                        <!-- /.image -->
                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-center">
                                        <h3 class="name"><a href="{{route('category.show',$category->slug)}}"><strong>{{ $category->name }}</strong></a></h3>
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                <a href="{{route('category.show',$category->slug)}}" data-toggle="tooltip" class="btn btn-primary" type="button"> <i class="fa fa-info"></i> More Details </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.category-product -->

              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane #list-container -->
            </div>
          </div>

          <!-- ============================================== ALL CATEGORIES : END ============================================== -->



          <!-- ============================================== WIDE BANNER ============================================== -->
          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner.jpg" alt=""> </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">The Perfect Growth<br>
                        <span class="shopping-needs">Weapon For Your Busines</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                  <!-- /.new-label -->
                </div>
                <!-- /.wide-banner -->
              </div>
              <!-- /.col -->

            </div>
            <!-- /.row -->
          </div>
          <!-- /.wide-banners -->
          <!-- ============================================== WIDE BANNER : END ============================================== -->

          <!-- ============================================== BEST SELLER ============================================== -->

          <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                @foreach ($bestServices as $service)
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                            <div class="image"> <a href="{{ route('service.detail',$service->slug)}}"> <img src="{{ asset('storage/services/'.$service->images->first()->image)}}" alt=""> </a> </div>
                              <!-- /.image -->
                            </div>
                            <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                            <h3 class="name"><a href="{{ route('service.detail',$service->slug)}}">{{ $service->name }}</a></h3>
                              <div class="">
                                @if ($service->reviews->count() >0)
                                <div class="">
                                    <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 0.5 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 1.5 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 2.5 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 3.5 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 4.5 ? 'checked' : ''}}"></span>

                                </div>
                                @else
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>

                                @endif
                              </div>
                              <div class="product-price"> <span class="price"> ${{ $service->price }} </span> </div>
                              <!-- /.product-price -->
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.product-micro-row -->
                      </div>
                      <!-- /.product-micro -->
                    </div>

                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <!-- /.sidebar-widget-body -->
          </div>
          <!-- /.sidebar-widget -->
          <!-- ============================================== BEST SELLER : END ============================================== -->

          <!-- ============================================== BLOG SLIDER ============================================== -->
          <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
              <div class="owl-carousel blog-slider custom-carousel">
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->

                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                      <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info -->

                  </div>
                  <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->

                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info -->

                  </div>
                  <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <!-- /.item -->

                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->

                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info -->

                  </div>
                  <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->

                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info -->

                  </div>
                  <!-- /.blog-post -->
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->

                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info -->

                  </div>
                  <!-- /.blog-post -->
                </div>
                <!-- /.item -->

              </div>
              <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
          </section>
          <!-- /.section -->
          <!-- ============================================== BLOG SLIDER : END ============================================== -->




        </div>
        <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->

        <!-- ============================================== SIDEBAR ============================================== -->
        @include('layouts.frontend.partial.homeSidebar')
        <!-- ============================================== SIDEBAR : END ============================================== -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  </div>
  <!-- /#top-banner-and-menu -->
@endsection


@push('js')

@endpush
