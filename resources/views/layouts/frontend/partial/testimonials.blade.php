<div class="sidebar-widget  wow fadeInUp">
    <div id="advertisement" class="advertisement">
        @foreach ($reviews as $review)


        <div class="item">
        <div class="avatar">
            @if ($review->image)
                <img src="{{ asset('storage/reviews/'.$review->image)}}" alt="Image">
            @else
            <img src="{{ asset('assets/images/avator.png')}}" alt="Image">
            @endif
        </div>
        <div class="testimonials"><em>"</em> {{$review->review}}<em>"</em></div>
        <div class="clients_author"> {{ $review->name}}</div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.item -->
      @endforeach

    </div>
    <!-- /.owl-carousel -->
  </div>
