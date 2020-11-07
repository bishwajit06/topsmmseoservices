@extends('layouts.frontend.master')
@section('title')
Home | Online Social media Market
@endsection
@push('css')

@endpush
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class='active'>{{ $category->name }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'>
          <!-- ================================== TOP NAVIGATION ================================== -->
            @include('layouts.frontend.partial.sidebarCategoryMenu')
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter">

                @include('layouts.frontend.partial.sidebarTag')

                <br><br>

                @include('layouts.frontend.partial.testimonials')

            </div>
            <!-- /.sidebar-filter -->
          </div>
          <!-- /.sidebar-module-container -->
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'>
          <!-- ========================================== SECTION – HERO ========================================= -->

          <div id="category" class="category-carousel hidden-xs">
            <div class="item">
                <div class="image">
                    @if($category->banner_image)
                    <img src="{{ asset('storage/category/banner/'.$category->banner_image) }}" alt="{{ $category->name }}" class="img-responsive"/>
                    @else
                    <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="{{ $category->name }}" class="img-responsive"/>
                    @endif
                </div>
              <div class="container-fluid">
                <div class="caption vertical-top text-left">
                  <div class="big-text"> {{ $category->name }} </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
          </div>


          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">


                </div>
                <!-- /.col -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>

          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                    <div class="row">

                        @foreach ($services as $service)

                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                        <div class="products">
                            <div class="product">
                            <div class="product-image">
                                <div class="image">
                                <a href="{{ route('service.detail',$service->slug)}}">
                                        @if ($service->images->first()->image)
                                        <img src="{{asset('storage/services/'.$service->images->first()->image)}}" alt="">
                                        @else
                                        <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                        @endif
                                    </a>
                                </div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                            <h3 class="name"><a href="{{ route('service.detail',$service->slug)}}">{{ $service->name }}</a></h3>
                                <div class="">
                                    @if ($service->reviews->count() >0)
                                        <div class="">
                                            <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 0.5 ? 'checked' : ''}}"></span>
                                            <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 1.5 ? 'checked' : ''}}"></span>
                                            <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 2.5 ? 'checked' : ''}}"></span>
                                            <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 3.5 ? 'checked' : ''}}"></span>
                                            <span class="fa fa-star {{$service->reviews->sum('star')/$service->reviews->count() > 4.5 ? 'checked' : ''}}"></span>
                                            <span>{{ $service->reviews->count() > 0 ? round($service->reviews->sum('star')/$service->reviews->count(),1) : 'No Reviews'}}</span>
                                        </div>
                                    @else
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            0.0
                                    @endif
                                </div>
                                <div class="description"> {!!  substr(strip_tags($service->description), 0, 55) !!} <a href="{{ route('service.detail',$service->slug)}}"> More Details</a></div>

                                <div class="product-price"> <span class="price"> ${{$service->price}} </span> <span class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button">
                                    <a href="{{ route('service.detail',$service->slug)}}" class="btn btn-primary icon"> Service Details</a >
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

            <div class="tab-pane "  id="list-container">
                <div class="category-product">


                    @foreach ($services as $service)

                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">
                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                                <div class="image">
                                    @if ($service->images->first()->image)
                                    <img src="{{asset('storage/services/'.$service->images->first()->image)}}" alt="">
                                    @else
                                    <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                    @endif
                                </div>
                            </div>
                            <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
                            <h3 class="name"><a href="{{ route('service.detail',$service->slug)}}">{{$service->name}}</a></h3>
                              <div class="">

                              </div>
                              <div class="product-price"> <span class="price"> ${{$service->price}} </span> <span class="price-before-discount">$ 800</span> </div>
                              <!-- /.product-price -->
                              <div class="description m-t-10">{!!  substr(strip_tags($service->description), 0, 400) !!} <br><a href="{{ route('service.detail',$service->slug)}}"> More Details</a></div>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('service.detail',$service->slug)}}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="{{ route('service.detail',$service->slug)}}" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action -->
                              </div>
                              <!-- /.cart -->

                            </div>
                            <!-- /.product-info -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.product-list-row -->
                        <div class="tag sale"><span>sale</span></div>
                      </div>
                      <!-- /.product-list -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.category-product-inner -->

                  @endforeach

                </div>
                <!-- /.category-product -->
              </div>
              <!-- /.tab-pane #list-container -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.search-result-container -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
    <!-- /.container -->
  </div>
  <!-- /.body-content -->
@endsection


@push('js')

@endpush
