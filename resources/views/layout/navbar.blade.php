<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      @if (Auth::user()->role != 'admin')
          <h1 class="logo"><a href="{{route('admin.index')}}">Reservasi | {{auth()->user()->name}} | @yield('judul_navbar')</a></h1>
      @else
          <h1 class="logo"><a href="{{route('siswa.index')}}">Reservasi | {{auth()->user()->name}} | @yield('judul_navbar')</a></h1>
      @endif
      <nav id="navbar" class="navbar">
        <ul>
          @if (Auth::user()->role != 'admin')
              <li><a class="nav-link scrollto" href="{{route('admin.index')}}">Dashboard</a></li>
          @else
              <li><a class="nav-link scrollto" href="{{route('siswa.index')}}">{{auth()->user()->name}}</a></li>
          @endif
            <form action="logout" method="POST">
                @csrf
                <input type="submit" value="LOGOUT" class="btn btn-danger">
            </form>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->
