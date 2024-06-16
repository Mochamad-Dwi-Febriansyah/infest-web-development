@extends('layouts.user.app')
@section('content-dashboard')

    <!-- hero -->
    <section id="hero" class="mb-3">
        <div class="container-fluid">
            <div class="heroes-content  rounded-2 d-flex align-items-center">
              <div class="container">
                <h1 class="text-white fw-bold mb-0">Get Your Job</h1>
                <span class="text-white">Explore all your fields</span>
              </div>
              <!-- <img src="dark-black-orange-3d-abstract-wallpaper-free-photo.jpg" alt="" class="rounded-2"> -->
            </div>
        </div>
    </section>

    <!-- search -->
    <section id="search" class="mines30 mb-4"> 
        <div class="container">
            <div class="row">
                <form class="d-flex input-container" role="search" method="GET">
                    <input class="form-control search-input" type="search" name="nama_lowongan" placeholder="Cari Lowongan" aria-label="Search">
                    <button class="btn text-white search-btn" type="submit"><img src="{{ url('user/img/search.png') }}" alt=""></button> 
                  </form>
            </div>
        </div>
    </section>

    <!-- card main -->
    <section id="card-main" class="mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3" id="filter-box">
                    <div class="card p-2 text-bg-light bg-body">
                        <div class="card-header text-bg-light bg-body d-flex align-items-center border-bottom fw-bold">
                          Filters  
                        </div>
                        <form action="" method="GET">
                            <div class="card-body">
                                <label class="card-title fw-medium">Pilih level</label> 
                                <select class="form-select" name="level" aria-label="Default select example">
                                    <option selected>Select a level</option>
                                    <option value="0">Mudah</option>
                                    <option value="1">Mengengah</option>
                                    <option value="2">Sulit</option>
                                  </select> 
                              </div>  
                            <div class="card-body">
                                <label class="card-title fw-medium">Tipe</label> 
                                <select class="form-select" name="tipe" aria-label="Default select example">
                                    <option selected>Select a Tipe</option>
                                    <option value="0">WFO</option>
                                    <option value="1">WFH</option>
                                    <option value="2">Remote</option>
                                  </select> 
                              </div>   
                            {{-- <div class="card-body">
                                <label class="card-title fw-medium">Availability</label> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" >
                                      Hourly
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label">
                                      Part time
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label">
                                      Full time
                                    </label>
                                  </div>
                            </div>    --}}
                            {{-- <div class="card-body"> 
                                <label for="customRange1" class="form-label fw-medium">Salary</label>
                                <input type="range" class="form-range" id="customRange1">
                            </div> --}}
                            <div class="card-body"> 
                                <button class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                        </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card p-2 border">
                        <div class="card-header bg-body d-flex align-items-center  fw-bold">
                          Daftar Lowongan @if (Request::get('nama_lowongan')) {{ Request::get('nama_lowongan') }} @endif
                          <div class="ms-auto d-flex align-items-center gap-2 fw-normal"> 
                            <label for="">Sortby</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>-</option>
                                <option value="1">Relevance</option>
                                <option value="2">Start due</option>
                                <option value="3">End due</option>
                              </select> 
                          </div>
                        </div>

                        @foreach ($getLowongan as $value)     
                        <a href="{{ url('/lowongan/id='.$value->id) }}" class="text-decoration-none border-bottom"> 
                        <div class="card-body d-flex gap-2">
                          <div>
                            <img src="{{ url('user/img/work-in-progress.png') }}" class="logo-mitra" alt="">
                          </div>
                          <div class=" pb-3">
                            <h5 class="card-title text-secondary">{{ $value->nama_lowongan }}</h5>
                            <h6 class="card-text text-secondary" style="font-size: .8rem;">{{ $value->nama_mitra }}</h6>
                            <p class="card-text multiline-ellipsis text-secondary" style="font-size: .9rem;">{{ $value->deskripsi_lowongan }}</p>
                            <h6 class="card-text   fw-bold text-secondary" style="font-size: .8rem;">{{ $value->gaji_batas_awal }} - {{ $value->gaji_batas_akhir }}</h6>
                            <h6 class="card-text  fw-bold text-secondary" style="font-size: .8rem;">
                              @if (!empty($value->tipe_lowongan === 0))
                                  Part time
                              @elseif(!empty($value->tipe_lowongan === 1))
                                    Full time
                              @elseif(!empty($value->tipe_lowongan === 2))
                                  Remote
                              @endif 
                            </h6>
                          </div>
                        </div> 
                      </a>
                        @endforeach

                       
                        
                        
                       

                        </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <div class="card p-2 text-bg-light bg-body">
                        <div class="card-header bg-body text-bg-light d-flex align-items-center border-bottom fw-bold">
                          Top Jobs  
                        </div>
                        @if (!empty($getTopJobs))
                            @foreach ($getTopJobs as $item)
                              @foreach($getLowongan as $lowongan)
                              @if ($getTopJobs->lowongan_id === $lowongan->id)
                              {{-- {{ $lowongan->nama_lowongan }} --}}
                              <div class="card-body">
                                <h5 class="card-title">{{ $lowongan->nama_lowongan }}</h5>
                                <p class="card-text">{{ $lowongan->deskripsi_lowongan }}</p> 
                              </div> 
                                @endif
                              @endforeach
                            @endforeach
                        @endif
                        
                        {{-- <div class="card-body">
                            <h5 class="card-title">Senior PHP Developer</h5> 
                            <p class="card-text pb-3 border-bottom">With supporting text below as a natural lead-in to additional content.</p>
                          </div>  
                        </div> --}}
                </div>
            </div>
        </div>
    </section>

@endsection