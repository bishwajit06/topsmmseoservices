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

                <!--custom chart end-->
                <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>SERVICE INFORMATIO</h5>
                            </div>
                            <canvas id="serverstatus01" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 70,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <div class="grey-header">
                                            <h3 style="font-weight: 900; color: #FF6B6B;" class="">{{ App\Service::all()->count()}} (Services)</h3>
                                        </div>
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
                                <h5>CATEGORY INFORMATIO</h5>
                            </div>
                            <canvas id="serverstatus02" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 60,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <div class="grey-header">
                                            <h3 style="font-weight: 900; color: #FF6B6B;" class="">{{ App\Category::where('parent_id', NULL)->get()->count()}} (Categories)</h3>
                                        </div>
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
                                <h5>TAG INFORMATIO</h5>
                            </div>
                            <canvas id="serverstatus03" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 70,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <div class="grey-header">
                                            <h3 style="font-weight: 900; color: #FF6B6B;" class="">{{ App\Tag::all()->count()}} (Tags)</h3>
                                        </div>
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
                                <h5>REVIEW INFORMATIO</h5>
                            </div>
                            <canvas id="serverstatus04" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 80,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus04").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="grey-panel">
                                        <div class="grey-header">
                                            <h3 style="font-weight: 900; color: #FF6B6B;" class="">{{ App\Review::all()->count()}} (Reviews)</h3>
                                        </div>
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
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>DROPBOX STATICS</h5>
                            </div>
                            <canvas id="serverstatus05" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 60,
                                    color: "#1c9ca7"
                                },
                                    {
                                        value: 40,
                                        color: "#f68275"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus05").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <p>April 17, 2014</p>
                            <footer>
                                <div class="pull-left">
                                    <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                                </div>
                                <div class="pull-right">
                                    <h5>60% Used</h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>SERVER LOAD</h5>
                            </div>
                            <canvas id="serverstatus06" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 70,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus06").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p>Usage<br/>Increase:</p>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <h2>21%</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4-->


                    <!-- /col-md-4 -->

                    <div class="col-md-3 col-sm-12 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>DROPBOX STATICS</h5>
                            </div>
                            <canvas id="serverstatus07" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 60,
                                    color: "#1c9ca7"
                                },
                                    {
                                        value: 40,
                                        color: "#f68275"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus07").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <p>April 17, 2014</p>
                            <footer>
                                <div class="pull-left">
                                    <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                                </div>
                                <div class="pull-right">
                                    <h5>60% Used</h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-3 col-sm-12 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5>SERVER LOAD</h5>
                            </div>
                            <canvas id="serverstatus08" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: 70,
                                    color: "#FF6B6B"
                                },
                                    {
                                        value: 30,
                                        color: "#fdfdfd"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus08").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p>Usage<br/>Increase:</p>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <h2>21%</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- /col-md-4 -->

                </div>
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
