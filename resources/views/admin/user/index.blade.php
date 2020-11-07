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
            <h3><i class="fa fa-angle-right"></i> All Slider</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">

                        <!--  MODALS -->
                        <div class="showback">
                            <!-- Button trigger modal -->
                            <button class="btn btn-theme pull-right" data-toggle="modal" data-target="#myModal">
                            Add New user
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-panel">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="last_name" class="control-label col-lg-3">First Name *</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror unicase-form-control text-input" id="first_name" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus >
                                                                @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="last_name" class="control-label col-lg-3">Last Name *</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror unicase-form-control text-input" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus >
                                                                @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="username" class="control-label col-lg-3">Username *</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control @error('username') is-invalid @enderror unicase-form-control text-input" id="username" name="username" value="{{ old('username') }}" autocomplete="username" autofocus >
                                                                @error('username')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email" class="control-label col-lg-3">Email *</label>
                                                            <div class="col-lg-9">
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="phone" class="control-label col-lg-3">Phone *</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror unicase-form-control text-input" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus >
                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="password" class="control-label col-lg-3">Password *</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" id="password" name="password" autocomplete="new-password">
                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="password-confirm" class="control-label col-lg-3">Copnfirm Password *</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" class="form-control unicase-form-control text-input" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="district" class="control-label col-lg-3">Division *</label>
                                                            <div class="col-lg-9">
                                                                <select class="form-control @error('division') is-invalid @enderror unicase-form-control text-input" id="division_id" name="division" autocomplete="division">
                                                                    <option value="" selected>Select Division</option>
                                                                    @foreach($divisions as $division)
                                                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('division')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="district" class="control-label col-lg-3">District *</label>
                                                            <div class="col-lg-9">
                                                                <select class="form-control @error('district') is-invalid @enderror unicase-form-control text-input" id="district_id" name="district" autocomplete="district">
                                                                    <option value="" selected>Select District</option>
                                                                    @foreach($districts as $district)
                                                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('district')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="district" class="control-label col-lg-3">Street Address *</label>
                                                            <div class="col-lg-9">
                                                                <textarea id="about" name="street_address" class="form-control @error('street_address') is-invalid @enderror unicase-form-control text-input" rows="1" autocomplete="street_address" autofocus>{{ old('street_address') }}</textarea>
                                                                @error('street_address')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="district" class="control-label col-lg-3">About (optional)</label>
                                                            <div class="col-lg-9">
                                                                <textarea id="about" name="about" class="form-control @error('about') is-invalid @enderror unicase-form-control text-input" rows="3" autocomplete="about" autofocus>{{ old('about') }}</textarea>
                                                                @error('about')
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Profile Image *</label>
                                                            <div class="col-md-9">
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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Verify</th>
                                        <th>All Posts</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($user->image)
                                            <img style="height: 30px; width:30px;" src="{{ asset('storage/profile/'.$user->image) }}"/>
                                            @else
                                            <img style="height: 30px; width:30px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                            @endif
                                        </td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->street_address}}</td>
                                        <td>
                                            @if ($user->status == 1)
                                            <form action="{{ route('admin.user.unverified',$user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-xs">Verified</button>
                                            </form>
                                            @else
                                                <form action="{{ route('admin.user.verify',$user->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs">Unverified</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->posts()->count() > 0 )
                                            <a target="_blank" class="btn btn-info btn-xs" href="{{route('userByPost.show',$user->username)}}">View Posts</a>
                                            @endif
                                        </td>


                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="#myModa{{$user->id}}" class="btn btn-primary btn-xs" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <!-- Modal -->

                                            <div class="modal fade" id="myModa{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit user</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-panel">
                                                                <div class="form">
                                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Image *</label>
                                                                            <div class="col-md-9">
                                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 100%;">
                                                                                        @if ($user->image)
                                                                                        <img src="{{ asset('storage/profile/'.$user->image) }}" alt="{{$user->name}}" />
                                                                                        @else
                                                                                        <img src="{{asset('assets/images/avator.png')}}" alt="{{$user->name}}" />
                                                                                        @endif
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

                                                                        <div class="form-group">
                                                                            <label for="first_name" class="control-label col-lg-3">First Name</label>
                                                                            <div class="col-lg-9">
                                                                            <input class="form-control" id="first_name" name="first_name" type="text" value="{{ $user->first_name}}"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="last_name" class="control-label col-lg-3">Last Name</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" id="last_name" name="last_name" type="text" value="{{ $user->last_name}}"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="username" class="control-label col-lg-3">User Name</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" id="username" name="username" type="text" value="{{ $user->username}}"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email" class="control-label col-lg-3">Email</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" id="email" name="email" type="email" value="{{ $user->email}}"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone" class="control-label col-lg-3">Phone Number</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" id="phone" name="phone" type="text" value="{{ $user->phone}}"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="street_address" class="control-label col-lg-3">Street Address</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" id="street_address" name="street_address" type="text" value="{{ $user->street_address}}"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="division" class="control-label col-lg-3">Division</label>
                                                                            <div class="col-lg-9">
                                                                                <select class="form-control" id="division" name="division">
                                                                                    <option value="">Select Division</option>
                                                                                    @foreach($divisions as $division)
                                                                                    <option value="{{$division->id}}" {{$user->division == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="district" class="control-label col-lg-3">District</label>
                                                                            <div class="col-lg-9">
                                                                                <select class="form-control" id="district" name="district">
                                                                                    <option value="">Select District</option>
                                                                                    @foreach($districts as $district)
                                                                                        <option value="{{$district->id}}" {{$user->district == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group ">
                                                                            <label for="about" class="control-label col-lg-3">About</label>
                                                                            <div class="col-lg-9">
                                                                                <textarea class="form-control" id="about" name="about" rows="3">{{ $user->about}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-theme">Update Profile</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-danger btn-xs" onclick="deleteSlider({{ $user->id }})"><i class="fa fa-trash-o "></i></button>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy',$user->id) }}" method="post" style="display:none;">
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
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Verify</th>
                                            <th>All Posts</th>
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
        function deleteSlider(id) {
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

    <script>
        $("#division_id").change(function(){
            var division  = $("#division_id").val();
            $("#district_id").html("");
            var option = ""

            $.get( "{{URL('get-districts')}}/"+division, function( data ) {

                data = JSON.parse(data);
                data.forEach(function(element){
                    option += "<option value='"+element.id+"'>"+element.name+"</option>";
                });

                $("#district_id").html(option);

            });
        });
    </script>

@endpush
