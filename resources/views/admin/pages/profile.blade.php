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
            <h3><i class="fa fa-angle-right"></i> Admin Profile</h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <div class="row">
                            <div class="col-md-3 profile-text mt mb centered">
                              <div class="profile-pic">
                                  <p style="text-align: -webkit-center;">
                                      @if ($user->image)
                                          <img src="{{ asset('storage/profile/'.$user->image) }}" alt="{{$user->name}}" />
                                          @else
                                          <img src="{{asset('assets/images/avator.png')}}" alt="{{$user->name}}" />
                                      @endif
                                  </p>
                                </div>
                            </div>
                            <!-- /col-md-4 -->
                            <div class="col-md-5 profile-text">
                                <br><br>
                                <h2 style="color: #4ECDC4; font-size:22px; font-weight:700">{{ $user->first_name }} {{ $user->last_name }}</h2>
                              <br>
                              <h6>
                                  @if ($user->status == 1)
                                  Main Administrator
                                  @else
                                  Author
                                  @endif
                              </h6>
                              <p>{{ $user->about }}</p>
                              <br>
                              <p><strong>Email: </strong>{{ $user->email }}</p>
                              <p><strong>Phone: </strong>{{ $user->phone }}</p>
                              <br><br>
                              <button class="btn btn-theme" data-toggle="modal" data-target="#myModal">
                                Update Profile
                              </button>
                              <button class="btn btn-theme" data-toggle="modal" data-target="#myModal2">
                                Change Password
                              </button>
                            </div>
                            <!-- /col-md-4 -->
                            <div class="col-md-4 centered">

                            </div>
                            <!-- /col-md-4 -->
                          </div>
                           <!-- /row -->
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="content-panel">
                        <!--  MODALS -->
                        <div class="showback">
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-panel">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf

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


                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel2">Change Password</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-panel">
                                                <div class="form">
                                                    <form class="cmxform form-horizontal style-form" id="commentForm" action="{{route('admin.profile.updatePassword')}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="old_password" class="control-label col-lg-3">Old Password</label>
                                                            <div class="col-lg-9">
                                                            <input class="form-control" id="old_password" name="old_password" type="password" placeholder="Old Password"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="control-label col-lg-3">New Password</label>
                                                            <div class="col-lg-9">
                                                            <input class="form-control" id="password" name="password" type="password" placeholder="New Password"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_confirmation" class="control-label col-lg-3">New Password (Confirm)</label>
                                                            <div class="col-lg-9">
                                                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="New Password (Confirm)"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-theme">Change Password</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
