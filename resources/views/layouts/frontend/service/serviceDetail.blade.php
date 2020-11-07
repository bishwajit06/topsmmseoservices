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
                <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{ route('category.show',$service->category->name)}}">{{ $service->category->name}}</a></li>
                    <li class='active'>{{ $service->name}}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        @include('layouts.frontend.partial.sidebarCategoryMenu')
                        <!-- ================================== TOP NAVIGATION : END ================================== -->

                        <!-- =============================== FREELANCER PROFILE =================================== -->
                        @include('layouts.frontend.partial.freelancerProfile')
                        <!-- =============================== FREELANCER PROFILE =================================== -->

                        <!-- ============================================== SERVICES TAGS ============================================== -->
                        @include('layouts.frontend.partial.sidebarTag')
                        <!-- ============================== SERVICES TAGS : END ================================================== -->
                        <br>
                        <!-- ============================================== Testimonials============================================== -->
                        @include('layouts.frontend.partial.testimonials')
                        <!-- ============================================== Testimonials: END ============================================== -->
                        <br>
                    </div>
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        @foreach ($service->images as $image)
                                        <div class="single-product-gallery-item" id="slide{{$image->id}}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/services/'.$image->image)}}">
                                                <img class="img-responsive" alt="" src="{{ asset('assets/images/blank.gif')}}" data-echo="{{ asset('storage/services/'.$image->image)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($service->images as $image)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="{{ asset('storage/services/'.$image->image)}}" />
                                                </a>
                                            </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->
                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{ $service->name}}</h1>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-4">
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
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{$service->reviews->count() > 0 ? $service->reviews->count() : 'No'}} {{ $service->reviews->count() == 1 ? 'Review' : 'Reviews' }})</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">Yes</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {!! html_entity_decode($service->short_description) !!}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">${{ $service->price}}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="https://www.freelancer.com/u/roytanushri13" target="_blank" class="btn btn-primary">Order To Freelancer</a>
                                                <a href="#" target="_blank" class="btn btn-primary">Peopleperhour</a>
                                                <a href="https://www.fiverr.com/tanushriroy19" target="_blank" class="btn btn-primary">Order To Fiverr</a>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->
                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                {!! html_entity_decode($service->description) !!}
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>


                                                    @foreach ($service->reviews as $review)
                                                    <div class="reviews">
                                                        <div class="review">
                                                            <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="review-image">
                                                                    @if ($review->image)
                                                                        <img style="background: #D0215F; padding: 2px; height: 80px; border-radius: 50px;" src="{{ asset('storage/reviews/'.$review->image)}}" alt="">
                                                                    @else
                                                                        <img style="background: #D0215F; padding: 2px; height: 80px; border-radius: 50px;" src="{{ asset('assets/images/avator.png')}}" alt="Avator">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="review-title">
                                                                    <span style="font-weight:600" class="summary">{{ $review->name}}</span>
                                                                    <span class="date"><i class="fa fa-calendar"></i><span>

                                                                    </span>
                                                                    {{$review->created_at->diffForHumans() }}
                                                                    </span>

                                                                    <div class="">
                                                                        <span class="fa fa-star {{$review->star >= 1 ? 'checked' : ''}}"></span>
                                                                        <span class="fa fa-star {{$review->star >= 2 ? 'checked' : ''}}"></span>
                                                                        <span class="fa fa-star {{$review->star >= 3 ? 'checked' : ''}}"></span>
                                                                        <span class="fa fa-star {{$review->star >= 4 ? 'checked' : ''}}"></span>
                                                                        <span class="fa fa-star {{$review->star >= 5 ? 'checked' : ''}}"></span>
                                                                    </div>
                                                                    </div>
                                                                    <div class="text">
                                                                    "{{ $review->review}}"
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.reviews -->
                                                    @endforeach


                                            </div><!-- /.product-reviews -->
                                            <form role="form" class="cnt-form" action="{{route('customer.review.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                    <div class="review-table">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell-label">&nbsp;</th>
                                                                        <th>1 star</th>
                                                                        <th>2 stars</th>
                                                                        <th>3 stars</th>
                                                                        <th>4 stars</th>
                                                                        <th>5 stars</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell-label">Review</td>
                                                                        <td><input type="radio" name="star" class="radio" value="1"></td>
                                                                        <td><input type="radio" name="star" class="radio" value="2"></td>
                                                                        <td><input type="radio" name="star" class="radio" value="3"></td>
                                                                        <td><input type="radio" name="star" class="radio" value="4"></td>
                                                                        <td><input type="radio" name="star" class="radio" value="5"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table><!-- /.table .table-bordered -->
                                                        </div><!-- /.table-responsive -->
                                                    </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="name">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="name" name="name" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                    <input type="hidden" class="form-control txt" id="service_id" name="service_id" value="{{$service->id }}" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Avatar Image <span class="astk">*</span></label>
                                                                        <div>
                                                                            <span><i class="fa fa-paperclip"></i> Select image</span>
                                                                            <input type="file" class="default" name="image"/>
                                                                            </span>
                                                                        </div>
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="review">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="review" id="review" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->


                                                        </div><!-- /.form-container -->
                                                    </div><!-- /.review-form -->
                                                </div><!-- /.product-add-review -->

                                            </form><!-- /.cnt-form -->
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">
                                            <h3 class="section-title">Services tags</h3>
                                            <div class="sidebar-widget-body">
                                            <div class="tag-list">
                                                    @foreach ($service->tags as $tag)
                                                    <a class="item" title="Facebook" href="{{ route('tag.show',$tag->slug)}}"> {{ $tag->name}}  </a>
                                                    @endforeach
                                                </div>
                                            <!-- /.tag-list -->
                                            </div>
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related Services</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            @foreach ($randomServices as $service)


                            <div class="item item-carousel">
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
                                            <div class="tag sale">
                                                <span>sale</span>
                                            </div>
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
                                            <div class="description"></div>

                                            <div class="product-price">
                                                <span class="price">${{ $service->price }}</span>
                                            </div><!-- /.product-price -->
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <a href="{{ route('service.detail',$service->slug)}}" class="btn btn-primary icon">
                                                            Details Service
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ================= UPSELL PRODUCTS : END ========== -->
                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection


@push('js')

@endpush
