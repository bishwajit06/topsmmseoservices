<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Services tags</h3>
    <div class="sidebar-widget-body">
      <div class="tag-list">
            @foreach (App\Tag::latest()->get() as $tag)
            <a class="item" title="Facebook" href="{{ route('tag.show',$tag->slug)}}"> {{ $tag->name}}  </a>
            @endforeach
        </div>
      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
