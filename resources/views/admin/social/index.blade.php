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
            <h3><i class="fa fa-angle-right"></i> ADD SOCIAL LINK</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> Social Media Link</h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.social.update',$social->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="facebook" class="control-label col-lg-1">Facebook Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="facebook" name="facebook" value="{{$social->facebook}}" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="twitter" class="control-label col-lg-1">Twitter Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="twitter" name="twitter" value="{{$social->twitter}}" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="instagram" class="control-label col-lg-1">Instagram Link</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="instagram" name="instagram" value="{{$social->instagram}}" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="pinterest" class="control-label col-lg-1">Pinterest Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="pinterest" name="pinterest" value="{{$social->pinterest}}" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="youtube" class="control-label col-lg-1">Youtube Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="youtube" name="youtube" value="{{$social->youtube}}" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="linkedin" class="control-label col-lg-1">Linkedin Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="linkedin" name="linkedin" value="{{$social->linkedin}}" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-2">

                                    </div>
                                    <label for="rss" class="control-label col-lg-1">RSS Link</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="rss" name="rss" value="{{$social->rss}}" type="text"/>
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
