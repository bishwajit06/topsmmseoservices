<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url(storage/sliders/{{$slider->image}});">
                <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                    <div style="color:#D0215F;" class="big-text fadeInDown-1"> {{$slider->title}} </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div style="font-size:20px;letter-spacing: 0.6em;" class="slider-header fadeInDown-1">{{Str::limit($slider->sub_title,'15')}}</div>
                            <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{Str::limit($slider->description, 100)}}</span> </div>
                        </div>
                    </div>
                    <div class="button-holder fadeInDown-3"> <a href="{{$slider->button_link}}" target="_blank" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{$slider->button_text}}</a> </div>
                </div>
                <!-- /.caption -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
        @endforeach
    </div>
    <!-- /.owl-carousel -->
</div>
