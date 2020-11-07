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
                    <li><a href="{{ route('category.show',$post->category->name)}}">{{ $post->category->name}}</a></li>
                    <li class='active'>{{ $post->name}}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ asset('storage/post/'.$post->image)}}" alt="">
                            <h1>{{$post->title}}</h1>
                            <span class="author"> <a href="{{route('userByPost.show',$post->user->username)}}">{{$post->user->first_name. ' ' .$post->user->last_name}}</a> </span>
                            <span class="review">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($post->comments as $comment)
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
                            <span class="date-time"> {{ $post->created_at->diffForHumans() }} </span>
                            <p>{!!  $post->body !!}</p>
                            <div class="post-tag-list">
                                @foreach ($post->tags()->get() as $tag)
                                    <a class="item" title="Facebook" href="{{ route('postTag.show',$tag->slug)}}"> {{ $tag->name}}  </a>
                                @endforeach
                            </div>
                            @php
                                  $social = App\Social::where('id', 1)->first();
                                @endphp
                            <div class="social-media">
                                <span>share post:</span>
                                <a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$social->rss}}" target="_blank"><i class="fa fa-rss"></i></a>
                                <a href="{{$social->pinterest}}" class="hidden-xs" target="_blank"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="blog-review wow fadeInUp">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title-review-comments">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($post->comments as $comment)
                                            @if ($comment->approve == 0)
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                         echo $i;
                                        @endphp
                                        Comments</h3>
                                </div>
                                @foreach ($post->comments as $comment)
                                    @if ($comment->approve == 0)
                                        <div class="col-md-2 col-sm-2">
                                            @if ($comment->image)
                                                <img src=" {{asset('storage/comment/'.$comment->image)}} " alt="Responsive image" class="img-rounded img-responsive">
                                            @else
                                                <img src=" {{asset('assets/images/avator.png')}} " alt="Responsive image" class="img-rounded img-responsive">
                                            @endif
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="blog-comments inner-bottom-xs outer-bottom-xs">
                                                <h4> {{$comment->name}} </h4>
                                                <span class="review-action pull-right">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">

                                <form class="register-form" action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <h4>Leave A Comment</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="info-title" for="name">Your Name <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control unicase-form-control text-input" id="post_id" name="post_id" value="{{$post->id}}" placeholder="Name">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="info-title" for="email">Email Address <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="info-title" for="image">Avatar Image <span>*</span></label>
                                            <input type="file" class="form-control unicase-form-control text-input" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="info-title" for="comment">Your Comments <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" id="comment" name="comment" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 outer-bottom-small m-t-20">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    @include('layouts.frontend.partial.postSidebar')

                </div>
            </div>
        </div>
    </div>




@endsection


@push('js')

@endpush
