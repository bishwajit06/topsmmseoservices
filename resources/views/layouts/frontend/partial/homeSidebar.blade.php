<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
    <!-- =============================== FREELANCER PROFILE =================================== -->
    @include('layouts.frontend.partial.freelancerProfile')
    <!-- =============================== FREELANCER PROFILE =================================== -->

    <!-- /.Fiverr Account-->
    @include('layouts.frontend.partial.fiverrProfile')
    <!-- /.Fiverr Account end -->
  <br>
  <!-- ============================================== Testimonials============================================== -->
  @include('layouts.frontend.partial.testimonials')
  <!-- ============================================== Testimonials: END ============================================== -->

   <br>

  <!-- ============================================== SPECIAL OFFER ============================================== -->

  <div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offer</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">
            @foreach (App\Service::latest()->take(3)->get() as $service)
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                    <div class="image"> <a href="{{ route('service.detail',$service->slug)}}"> <img src="{{ asset('storage/services/'.$service->images->first()->image)}}" alt=""> </a></div>
                      <!-- /.image -->
                    </div>
                    <!-- /.product-image -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ route('service.detail',$service->slug)}}">{{ $service->name}}</a></h3>
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
                      <div class="product-price"> <span class="price"> ${{ $service->price}} </span> </div>
                      <!-- /.product-price -->
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.product-micro-row -->
              </div>
              <!-- /.product-micro -->
            </div>
            @endforeach
          </div>
        </div>

        <div class="item">
          <div class="products special-product">
            @foreach (\App\Service::all()->random(3) as $service)
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
                  <div class="col col-xs-7">
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
            @endforeach
          </div>
        </div>
        <div class="item">
          <div class="products special-product">
            @foreach (App\Service::all()->random(3) as $service)
            <div class="product">

                <div class="product-micro">
                    <div class="row product-micro-row">
                    <div class="col col-xs-5">
                        <div class="product-image">
                        <div class="image"> <a href="{{ route('service.detail',$service->slug)}}"> <img src="{{ asset('storage/services/'.$service->images->first()->image)}}"  alt=""> </a> </div>
                        <!-- /.image -->

                        </div>
                        <!-- /.product-image -->
                    </div>
                    <!-- /.col -->
                    <div class="col col-xs-7">
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
                        <div class="product-price"> <span class="price"> ${{ $service->price}} </span> </div>
                        <!-- /.product-price -->

                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.product-micro-row -->
                </div>
                <!-- /.product-micro -->

            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
  <!-- ============================================== SPECIAL OFFER : END ============================================== -->
  <!-- ============================================== SERVICES TAGS ============================================== -->
  @include('layouts.frontend.partial.sidebarTag')
  <br>
  <!-- ============================================== PRODUCT TAGS : END ============================================== -->

</div>
