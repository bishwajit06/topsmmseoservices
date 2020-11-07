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
                    <li><a href="{{ route('postTag.show',$tag->name)}}">{{ $tag->name}}</a></li>
                    <li class='active'>{{ $tag->name}}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->



    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                            <div class="blog-post  wow fadeInUp">
                                <a href="{{route('post.details',$post->slug)}}">
                                    @if ($post->image)
                                        <img class="img-responsive" src="{{ asset('storage/post/'.$post->image)}}" alt="">
                                    @else
                                        <img class="img-responsive" src=" {{asset('assets/backend/img/demo_image.png')}} " alt="">
                                    @endif
                                </a>

                                <h1><a href="{{route('post.details',$post->slug)}}">{{$post->title}}</a></h1>
                                <span class="author"><a href="{{route('userByPost.show',$post->user->username)}}">{{$post->user->first_name. ' ' .$post->user->last_name}}</a></span>
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
                                <span class="date-time">{{ $post->created_at->diffForHumans() }}</span>
                                <p>{!!  substr(strip_tags($post->body), 0, 220) !!} ....</p>
                                <a href="{{route('post.details',$post->slug)}}" class="btn btn-upper btn-primary read-more">read more</a>
                            </div>
                            @endforeach
                        @else
                            <div class="blog-post  wow fadeInUp">
                                <img class="img-responsive" src=" {{asset('assets/images/No-data.png')}} " alt="">
                                <h1>There is no post in this catagory</h1>
                            </div>
                        @endif

                        <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    {{ $posts->links() }}
                                    <!-- /.list-inline -->
                                </div><!-- /.pagination-container -->
                            </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->
                </div>

                @include('layouts.frontend.partial.postSidebar')

            </div>
        </div>
    </div>

@endsection


@push('js')

@endpush
