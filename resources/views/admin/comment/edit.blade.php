@extends('layouts.backend.master')

@section('title','Product Create')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datetimepicker/datertimepicker.css')}}" />
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> EDIT REVIEW</h3>


            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.review.index')}}" type="button" class="btn btn-theme">Back All Category</a></h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" action="{{route('admin.review.update',$review->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="name" name="name" type="text" value="{{$review->name}}"/>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Select Services</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="service_id">
                                            <option value="">Select Service</option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}" {{$service->id == $review->service_id ? 'selected' : ''}}>{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="review" class="control-label col-lg-2">Review</label>
                                    <div class="col-lg-8">
                                    <textarea class="form-control" name="review" rows="5">{{ $review->review }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="star" class="control-label col-lg-2">Star</label>
                                    <div class="col-lg-8">
                                        <label class="radio-inline">
                                        <input type="radio" name="star" id="inlineRadio1" value="1" {{ $review->star == 1 ? 'checked' : ''}}> 1
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="star" id="inlineRadio2" value="2" {{ $review->star == 2 ? 'checked' : ''}}> 2
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="star" id="inlineRadio3" value="3" {{ $review->star == 3 ? 'checked' : ''}}> 3
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="star" id="inlineRadio3" value="4" {{ $review->star == 4 ? 'checked' : ''}}> 4
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="star" id="inlineRadio3" value="5" {{ $review->star == 5 ? 'checked' : ''}}> 5
                                          </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Customer Image</label>
                                    <div class="col-md-10">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail">
                                                @if($review->image)
                                                <img style="height: 50px;" src="{{ asset('storage/reviews/'.$review->image) }}"/>
                                                @else
                                                <img style="width: 50px; height: 50px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 50px; max-height: 50px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="image" value="{{$review->image}}"/>
                                                </span>
                                                <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Update</button>
                                        <a href="{{route('admin.review.index')}}" class="btn btn-theme04" type="button">Back</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </section>
        <!-- /wrapper -->
    </section>
@endsection

@push('js')
    <script src="{{asset('assets/backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('assets/backend/lib/advanced-form-components.js')}}"></script>
    <script src="{{asset('assets/backend/lib/advanced-form-components.js')}}"></script>
@endpush
