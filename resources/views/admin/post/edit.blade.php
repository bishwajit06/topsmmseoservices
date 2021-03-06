@extends('layouts.backend.master')

@section('title','Post Edit')

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
            <h3><i class="fa fa-angle-right"></i> EDIT POST</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h4><i class="fa fa-angle-right"></i> Edit Post</h4>
                    <div class="form-panel">
                        <div class=" form">
                            <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="title" class="control-label col-lg-2">Post Title (required)</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="title" name="title" type="text" value="{{$post->title}}"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2"> Post Category</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="category_id">
                                            @foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
                                                <option value="{{$parent->id}}" {{$parent->id==$post->category_id ? 'selected' : ''}}>{{$parent->name}}</option>
                                                @foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
                                                    <option value="{{$child->id}}" {{$child->id==$post->category_id ? 'selected' : ''}}><i class="fa fa-long-arrow-right"></i>---{{$child->name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2"> Post Tag</label>
                                    <!-- Build your select: -->
                                    <div class="col-lg-8">
                                        <select id="example-getting-started" multiple="multiple" name="tags[]">
                                            <label for="cname" class="control-label"> Select Tag</label>
                                            @foreach(App\Tag::all() as $tag)
                                            <option
                                                @foreach($post->tags as $serviceTag)
                                                {{ $serviceTag->id == $tag->id ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">Post Description</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="tinymce" name="body" rows="10">{!! html_entity_decode($post->body) !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Post Image Upload</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @if ($post->image)
                                            <div class="col-md-2">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img style="width: 100%; height: 100%;" src="{{asset('storage/post/'.$post->image)}}" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="image" value="{{$post->image}}"/>
                                                </span>
                                                        <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-md-2">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" name="image"/>
                                                </span>
                                                        <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-theme" type="submit">Save</button>
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
