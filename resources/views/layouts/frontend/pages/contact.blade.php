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
				<li><a href="#">Home</a></li>
				<li class='active'>Contact</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
            <div class="contact-page">
				<div class="col-md-12 contact-map outer-bottom-vs">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" width="600" height="450"  style="border:0"></iframe>
				</div>
                <form action="{{route('contact.submit')}}" method="POST">
                    @csrf
                    <div class="col-md-8 contact-form">
                        <div class="col-md-12 contact-title">
                            <h4>Contact Form</h4>
                        </div>
                        <div class="col-md-4 ">
                                <div class="form-group">
                                    <label class="info-title" for="email">Your Name <span style="color: red">*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" placeholder="" name="name" value="">
                            </div>
                        </div>
                        <div class="col-md-4">

                                <div class="form-group">
                                <label class="info-title" for="email">Email Address <span style="color: red">*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="email" placeholder="" name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                <label class="info-title" for="phone">Phone <span style="color: red">*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="phone" placeholder="" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                <label class="info-title" for="msg">Message <span style="color: red">*</span></label>
                                <textarea class="form-control unicase-form-control" id="msg" name="message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 outer-bottom-small m-t-20">
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-4 contact-info">
                    <div class="contact-title">
                        <h4>Information</h4>
                    </div>
                    <div class="clearfix address">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">ThemesGround, 789 Main rd,<br> Anytown, CA 12345 USA</span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">+(888) 123-4567<br>+(888) 456-7890</span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">support@topsmmseoservices.com</a></span>
                    </div>
                </div>
            </div><!-- /.contact-page -->
	    </div><!-- /.row -->
    </div><!-- /.container -->
</div>
@endsection


@push('js')

@endpush
