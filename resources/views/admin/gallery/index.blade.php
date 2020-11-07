@extends('layouts.backend.master')

@section('title','')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/lib/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />

    <style>
        .content-panel{
            padding: 10px;
        }
        .form-horizontal.style-form .form-group{
            border-bottom: 0px;
        }
        .form-group{
            width: 100%;
        }

        .showback{
            box-shadow: none;
        }

    </style>
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Gallery</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">

                        <!--  MODALS -->
                        <div class="showback">
                            <!-- Button trigger modal -->
                            <button class="btn btn-theme pull-right" data-toggle="modal" data-target="#myModal">
                            Add New Upload
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-panel">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.gallery.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Image *</label>
                                                            <div class="col-md-10">
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
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-theme">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="showback">

                            <div class="adv-table">
                                <table class="table table-striped table-advance table-hover" id="hidden-table-info">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($galleries as $key => $gallery)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($gallery->image)
                                            <img style="height: 100px;" src="{{ asset('storage/gallery/'.$gallery->image) }}"/>
                                            @else
                                            <img style="height: 100px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                            @endif
                                        </td>
                                        <td>{{ asset('storage/gallery/'.$gallery->image) }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="#myModa{{$gallery->id}}" class="btn btn-primary btn-xs" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <!-- Modal -->

                                            <div class="modal fade" id="myModa{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Image</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-panel">
                                                                <div class="form">
                                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-2">Image *</label>
                                                                            <div class="col-md-10">
                                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 100%;">
                                                                                        <img src="{{ asset('storage/gallery/'.$gallery->image) }}" alt="" />
                                                                                    </div>
                                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                    <div>
                                                                                        <span class="btn btn-theme02 btn-file">
                                                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                                        <input type="file" class="default" name="image"/>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-theme">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-danger btn-xs" onclick="deleteGallery({{ $gallery->id }})"><i class="fa fa-trash-o "></i></button>
                                            <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.gallery.destroy',$gallery->id) }}" method="post" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>



                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
@endsection

@push('js')
    <!-- js placed at the end of the document so the pages load faster -->
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


    <script type="text/javascript" language="javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        function deleteGallery(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <!--script for this page-->

@endpush
