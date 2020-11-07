@extends('layouts.backend.master')
@section('title','home')
@push('css')

@endpush
@section('content')
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12 main-chart">
                <!--CUSTOM CHART START -->
                <div class="border-head">
                    <h3>Admin PANEL</h3>
                </div>

                <div class="custom-bar-chart">
                    <ul class="y-axis">
                      <li><span>10.000</span></li>
                      <li><span>8.000</span></li>
                      <li><span>6.000</span></li>
                      <li><span>4.000</span></li>
                      <li><span>2.000</span></li>
                      <li><span>0</span></li>
                    </ul>
                    <div class="bar">
                      <div class="title">JAN</div>
                      <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                    </div>
                    <div class="bar ">
                      <div class="title">FEB</div>
                      <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                    </div>
                    <div class="bar ">
                      <div class="title">MAR</div>
                      <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                    </div>
                    <div class="bar ">
                      <div class="title">APR</div>
                      <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                    </div>
                    <div class="bar">
                      <div class="title">MAY</div>
                      <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                    </div>
                    <div class="bar ">
                      <div class="title">JUN</div>
                      <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                    </div>
                    <div class="bar">
                      <div class="title">JUL</div>
                      <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                    </div>
                </div>

                <!--custom chart end-->
                <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>SERVICE INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.service.index')}}"><i class="icon fa fa-rocket"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Service::all()->count()}} Services</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4-->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>CATEGORY INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.category.index')}}"><i class="icon fa fa-th"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Category::where('parent_id', NULL)->get()->count()}} Categories</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>TAG INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.tag.index')}}"><i class="icon fa fa-list-alt"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Tag::all()->count()}} Tags</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>REVIEW INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.review.index')}}"><i class="icon fa fa-comments-o"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Review::all()->count()}} Reviews</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->

                <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>BLOG POST INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.post.index')}}"><i class="icon fa fa-clipboard"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Post::all()->count()}} Posts</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4-->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>COMMENT INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.comment.index')}}"><i class="icon fa fa-comments-o"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Comment::all()->count()}} Comments</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>PAGE INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.page.index')}}"><i class="icon fa fa-file-text-o"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Page::all()->count()}} Pages</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>GALLERY INFORMATION</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <a href="{{route('admin.gallery.index')}}"><i class="icon fa fa-upload"></i></a>
                                        <h3 class="dashBoardInfoTitle">{{ App\Gallery::all()->count()}} Gallery {{ App\Gallery::all()->count() > 1 ? 'Images' : 'Image'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->


            </div>
        </div>
        <!-- /row -->
    </section>
</section>
@endsection


@push('js')
    <!--script for this page-->
    <script src="{{asset('assets/backend/lib/sparkline-chart.js')}}"></script>
    <script src="{{asset('assets/backend/lib/zabuto_calendar.js')}}"></script>

    <script type="application/javascript">
        $(document).ready(function() {
            $("#date-popover").popover({
                html: true,
                trigger: "manual"
            });
            $("#date-popover").hide();
            $("#date-popover").click(function(e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function() {
                    return myDateFunction(this.id, false);
                },
                action_nav: function() {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                },
                    {
                        type: "block",
                        label: "Regular event",
                    }
                ]
            });
        });

    </script>
@endpush
