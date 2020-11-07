<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{route('admin.dashboard')}}" class="logo"><b>TOP <span>SMM</span></b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <ul class="nav top-menu">
            <!-- inbox dropdown start-->
          @if(Request::is('admin*'))
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
                @if (App\Contact::where('read', 1)->count() > 0)
                <span class="badge bg-theme">{{ App\Contact::where('read', 1)->count() }}</span>
                @endif
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                @if (App\Contact::where('read', 1)->count() > 0)
                    <p class="green">You have {{ App\Contact::where('read', 1)->count() }} new messages</p>
                @else
                    <p class="green">You have no any messages</p>
                @endif
              </li>
              @if (App\Contact::where('read', 1)->count() > 0)
                @foreach (App\Contact::where('read', 1)->get() as $contact)
                <li>
                    <a>
                        <span class="subject">
                        <span class="from">{{$contact->name}}</span>
                        <span class="time">{{ $contact->created_at->diffForHumans() }}</span>
                        </span>
                        <span class="message">
                            {{ Str::limit($contact->message,30) }}
                        </span>
                        <span>
                            <form action="{{route('contact.read',$contact->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-xs" style="margin-top:10px; float:right">Read</button>
                            </form>
                        </span>
                    </a>
                </li>
                @endforeach
              @endif

              <li>
                <a href="{{route('admin.contact.index')}}">See all messages</a>
              </li>
            </ul>
          </li>
          @endif
          <!-- inbox dropdown end -->
            <li><a href="{{route('home')}}" class="btn" target="_blank">Website</a></li>
        </ul>
    </div>
    <div></div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <a class="logout" href="{{route('logout')}}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</header>
