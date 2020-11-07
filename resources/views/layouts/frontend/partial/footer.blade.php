<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">Contact Us</h4>
            </div>
            <!-- /.module-heading -->

            <div class="module-body">
              <ul class="toggle-footer" style="">
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p>ThemesGround, 789 Main rd <br> Anytown, CA 12345 USA</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p>+(888) 123-4567<br>
                      +(888) 456-7890</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body"> <span><a href="#">support@topsmmseoservices</a></span> </div>
                </li>
              </ul>
            </div>
            <!-- /.module-body -->
          </div>
          <!-- /.col -->

          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="module-heading">
              <h4 class="module-title">Latest Service</h4>
            </div>
            <!-- /.module-heading -->

            <div class="module-body">
                <div class="footer-service">
                    @foreach (App\Service::latest()->take('2')->get() as $service)
                    <div>
                        <a href="{{ route('service.detail',$service->slug)}}">
                            @if ($service->images->first()->image)
                            <img src="{{asset('storage/services/'.$service->images->first()->image)}}" alt="">
                            @else
                            <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                            @endif
                        </a>
                    </div>
                    <strong><a href="{{ route('service.detail',$service->slug)}}" title="Contact us">{{$service->name}}</a></strong>
                    <p>{!!  substr(strip_tags($service->description), 0, 80) !!} ...</p>
                    </li>
                    @endforeach
                </div>
            </div>
            <!-- /.module-body -->
          </div>
          <!-- /.col -->

          <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="module-heading">
              <h4 class="module-title">Latest Blog Post</h4>
            </div>
            <!-- /.module-heading -->

            <div class="module-body">
                <div class="footer-service">
                    @foreach (App\Post::latest()->take('2')->get() as $post)
                    <div>
                        <a href="{{ route('post.details',$post->slug)}}">
                            @if ($post->image)
                            <img src="{{asset('storage/post/'.$post->image)}}" alt="">
                            @else
                            <img src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                            @endif
                        </a>
                    </div>
                    <strong><a href="{{ route('post.details',$post->slug)}}" title="Contact us">{{$post->title}}</a></strong>
                    <p>{!!  substr(strip_tags($post->body), 0, 100) !!} ...</p>
                    </li>
                    @endforeach
                </div>
            </div>
            <!-- /.module-body -->
          </div>
          <!-- /.col -->


        </div>
      </div>
    </div>
    <div class="copyright-bar">
      <div class="container">
        <div class="col-xs-12 col-sm-4 no-padding social">
          <ul class="link">
              @php
                  $social = App\Social::where('id', 1)->first();
              @endphp
            <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{$social->facebook}}" title="Facebook"></a></li>
            <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{$social->twitter}}" title="Twitter"></a></li>
            <li class="instagram pull-left"><a target="_blank" rel="nofollow" href="{{$social->instagram}}" title="instagram"></a></li>
            <li class="rss pull-left"><a target="_blank" rel="nofollow" href="{{$social->facebook}}" title="RSS"></a></li>
            <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="{{$social->pinterest}}" title="PInterest"></a></li>
            <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{$social->linkedin}}" title="Linkedin"></a></li>
            <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{$social->youtube}}" title="Youtube"></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-5 no-padding">
          <div class="copyright-text">
          <p>{!!  $setting->footer_copyright !!}</a></p>
          </div>
          <!-- /.payment-methods -->
        </div>
        <div class="col-xs-12 col-sm-3 no-padding">
          <div class="clearfix payment-methods">
            <ul>
              <li><a href="https://www.freelancer.com/u/roytanushri13" target="_blank"><img src="{{ asset('assets/images/payments/freelancer.png')}}" alt=""></a></li>
              <li><a href="https://www.fiverr.com/tanushriroy19" target="_blank"><img src="{{ asset('assets/images/payments/fiverr.png')}}" alt=""></a></li>
              <li><a href="#" target="_blank"><img src="{{ asset('assets/images/payments/peopleperhours.png')}}" alt=""></a></li>
            </ul>
          </div>
          <!-- /.payment-methods -->
        </div>
      </div>
    </div>
  </footer>
  <!-- ============================================================= FOOTER : END============================================================= -->


