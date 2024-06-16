<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job researcher</title>
    <link rel="stylesheet" href="{!! url('user/css/style.css') !!}">
    <link rel="shortcut icon" href="{{ url('user/img/work-in-progress.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container">
            <div class="d-flex align-items-center">
                <img src="{{ url('user/img/work-in-progress.png') }}" alt="" class="me-2" width="50" height="50">
                <a class="navbar-brand text-secondary" href="{{ url('/') }}"><h5 class="fw-bold">JobReseacher</h5></a>
            </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
              <li class="nav-item">
                <a class="nav-link fw-medium" href="{{ url('/') }}">Dashboard</a>
              </li> 
              {{-- <li class="nav-item">
                <a class="nav-link fw-medium" href="">Ai agents</a>
              </li> --}}
              <li class="nav-item dropdown"> 
                <a class="nav-link dropdown-toggle fw-medium" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->nama }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li> 
                  <li><a class="dropdown-item fw-medium" href="{{ url('/pendaftaran_mitra') }}">Daftar mitra?</a></li> 
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item fw-medium" href="{{ url('/logout') }}"><img src="{{ url('user/img/logout.png') }}" alt="" class="icon">Logout</a></li>
              </ul> 
              </li>
            </ul> 
          </div>
        </div>
    </nav>

    @yield('content-dashboard')

    
    <footer class="footer rounded-top">
        <div class="container">
          <div class="row text-white d-flex gap-2 justify-content-between py-4">
            <div class="col-md-3">
              <img src="{{ url('user/img/work-in-progress.png') }}" alt="">
              <p>JobSeeker adalah platform pencarian kerja yang mengintegrasikan teknologi asisten chat untuk mempersonalisasi, menyaring, dan meningkatkan efektivitas serta kepuasan pencari kerja.</p>
            </div> 
            <div class="col-md-2">
              <h4>Menu</h4>
              <ul class="list-group">
                <li class="list-group-item bg-transparent text-white border-0">Dashboard</li>
                <li class="list-group-item bg-transparent text-white border-0">AI Agents</li> 
              </ul>
            </div> 
            <div class="col-md-2">
              <h4>Program</h4>
            </div> 
            <div class="col-md-3">
              <h4>Hubungi Kami</h4> 
              <ul class="list-group">
                <li class="list-group-item bg-transparent text-white border-0">iniakunnyaorangjoos@gmail.com</li>
                <li class="list-group-item bg-transparent text-white border-0">+62812-2604-7345</li> 
                <li class="list-group-item bg-transparent text-white border-0">Kene, Mangunjiwan, Demak Sub-District, Demak Regency, Central Java 59515</li> 
              </ul>
            </div> 
          </div>
          </div> 
          <div class="bg-dark text-white">
            <div class="container py-2" style="font-size: .8rem;">
              Copyright 2023 Mochamad Dwi Febriansyah Foundation, All Right Reserved
            </div>
          </div>
      </footer>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="{!! url('user/js/script.js') !!}"></script>
    </body>
  </html>