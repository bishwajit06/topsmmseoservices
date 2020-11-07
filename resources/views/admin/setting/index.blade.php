@extends('layouts.backend.master')

@section('title','Product Create')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datetimepicker/datertimepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-multiselect.css')}}" type="text/css"/>
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> HOME SETTING</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> Home Setting</h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.setting.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <div class="col-lg-2">
                                        @if ($setting->logo)
                                            <img style="height: 60px" src="{{asset('storage/setting/logo/'.$setting->logo)}}" alt="Image">
                                        @else
                                            <img style="height: 100px" src=" {{asset('assets/images/demo.png')}} " alt="Image">
                                        @endif
                                    </div>
                                    <label for="logo" class="control-label col-lg-1">Logo</label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="logo" name="logo"/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-lg-2">
                                        @if ($setting->favicon)
                                            <img style="height: 50px" src="{{asset('storage/setting/favicon/'.$setting->favicon)}}" alt="Image">
                                        @else
                                            <img style="height: 100px" src=" {{asset('assets/images/demo.png')}} " alt="Image">
                                        @endif
                                    </div>
                                    <label for="favicon" class="control-label col-lg-1">Favicon</label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="favicon" name="favicon"/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-lg-2">
                                        @if ($setting->home_banner)
                                            <img style="height: 40px" src="{{asset('storage/setting/home_banner/'.$setting->home_banner)}}" alt="Image">
                                        @else
                                            <img style="height: 100px" src=" {{asset('assets/images/demo.png')}} " alt="Image">
                                        @endif
                                    </div>
                                    <label for="home_banner" class="control-label col-lg-1">Home Banner</label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="home_banner" name="home_banner"/>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="top_contact" class="control-label col-lg-1">Top Contact</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="tinymce" name="top_contact" rows="10"> {{$setting->top_contact}} </textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="header_title" class="control-label col-lg-1">Header Title</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="tinymce" name="header_title" rows="10">{{$setting->header_title}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="footer_copyright" class="control-label col-lg-1">Footer Text</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="tinymce" name="footer_copyright" rows="10">{{$setting->footer_copyright}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-8">
                                        <button class="btn btn-theme" type="submit">Update</button>
                                        <button class="btn btn-theme04" type="button">Cancel</button>
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


    <script src="{{ asset('assets/backend/lib/tinymce/tinymce.js') }}"></script>

    <!-- Custom Js -->
    <script>
        $(function () {

            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/lib/tinymce') }}';
        });
    </script>

    <script type="text/javascript" src="{{ asset('assets/backend/lib/bootstrap-multiselect.js') }}"></script>
    <!-- Initialize the plugin: -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-getting-started').multiselect();
        });
    </script>
@endpush
