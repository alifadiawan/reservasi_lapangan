<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      @if (Auth::user()->role == 'admin')
          <h1 class="logo"><a href="{{route('admin.index')}}">ADMIN | @yield('judul_navbar')</a></h1>
      @else
          <h1 class="logo"><a href="  ">{{auth()->user()->name}} | @yield('judul_navbar')</a></h1>  
      @endif
      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto" href="{{route('siswa.index')}}">{{auth()->user()->name}}</a></li>
            
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logout_modal" type="button" >
                  <i class="fa fa-sign-out"></i>
              </button> 
              <x:notify-messages />
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->


    </div>
  </header>
  <!-- End Header -->
