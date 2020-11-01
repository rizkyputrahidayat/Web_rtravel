<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="#">
        <img src="{{url('frontend/images/logo traveleriz@2x.png')}}" alt="TRAVELERIZ" />
      </a>
      <button class="navbar-toggler navbar-tooggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a href="{{ route('home') }}" class="nav-link active">
              Home
            </a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="" class="nav-link">
              Paket Travel
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Service
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item mx-md-2">
            <a href="" class="nav-link">
              Testimonial
            </a>
          </li>
        </ul>
        
        @guest
        {{-- Mobile Button --}}
          <form class="form-inline d-sm-block d-md-none">
            <button class="btn btn-login my-2 my-sm-0" type="button" 
              onclick="event.preventDefault(); location.href='{{url('login')}}';">
            Masuk
          </button>
          </form>
          {{-- Dekstop Button --}}
          <form class="form-inline my-2 my-lg-0 d-none d-md-block">
            <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
              onclick="event.preventDefault(); location.href='{{url('login')}}';">
              Masuk
            </button>
          </form>
        @endguest

        @auth
            {{-- Mobile Button --}}
        <form action="{{url('logout')}}" class="form-inline d-sm-block d-md-none"
        method="POST">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
            Keluar
          </button>
        </form>
        {{-- Dekstop Button --}}
        <form action="{{url('logout')}}" class="form-inline my-2 my-lg-0 d-none d-md-block"
        method="POST">
          @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
          type="submit">
            Keluar
          </button>
        </form>
        @endauth

      </div>
    </nav>
  </div>