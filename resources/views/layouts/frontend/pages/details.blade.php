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
                <li class='active'>{{$page->name}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
            <div class="contact-page">
                @if ($page->image)
                    <div class="col-md-12 contact-map outer-bottom-vs">
                        <img class="img-responsive" src="{{ asset('storage/page/'.$page->image)}}" alt="">
                    </div>
                @endif

				<div class="col-md-12">
                    {!!  $page->body !!}
                </div>
            </div><!-- /.contact-page -->
	    </div><!-- /.row -->
    </div><!-- /.container -->
</div>
@endsection


@push('js')

@endpush
