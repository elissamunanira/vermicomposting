<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>


    <body  style="background-color:#4D5F7E" >

    <nav class="navbar navbar-expand-lg navbar-light " style ="background-color:#2A3549">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          {{-- logo found in public  --}}

          <img width="100px" height="50px"
          src="{{ asset('images/logo.png') }}"  class = "img-rounded"/>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @if(auth()->user())
            <li class="nav-item">
              <a class="nav-link active " style="color:#ffffff"aria-current="page" href="/bins">Bins</a>
            </li>
            @endif

            @if(auth()->user())
            <li class="nav-item">
              <a class="nav-link" style="color:#ffffff" href="/create_bin">AddBin</a>
            </li>
            @endif



          </ul>

          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" style="color:#ffffff"type="submit">Search</button>
          </form>

         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ms-auto" >
          @if(auth()->user())
            <a class="nav-link" style="background-color:#ffffff" href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
              </svg>
              </a>
              @endif
    </li>
      @if(!auth()->user())

        <li class="nav-item">
                <a class="nav-link" style="color:#ffffff" href="/login">Login</a>
        </li>

      @endif
      @if(auth()->user())
        <li class="nav-item">
          <a class="nav-link" style="color:#ffffff" href="/logout">logout</a>
  </li>
    @endif
        <li class="nav-item">
            <a class="nav-link"style="color:#ffffff" href="/register">Register</a>
        </li>
          
    </ul>



        </div>
      </div>
    </nav>
    @yield('content')









    @include('Normal.footer')


  </body>
