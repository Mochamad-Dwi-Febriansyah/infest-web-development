@extends('layouts.user.app')
@section('content-dashboard')

    <!-- hero -->
    <section id="hero" class="mb-3">
        <div class="container-fluid">
          <div class="heroes-content  rounded-2 d-flex align-items-center">
            <div class="container d-flex align-items-center gap-2">
              <div class="box-image-p mb-3">
                <img class="round rounded-circle" src="{{ url('user/img/How-to-Get-a-Job-Where-You-Used-to-Work.jpg') }}" alt="">
              </div>
              <div class="col-8">
                <h4 class="fw-medium text-white mb-0" style="text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">Mochamad Dwi Febriansyah</h4>
                <h6 class="fw-light text-white" style="text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">iniakunnyaorangjoos@gmail.com</h6>
              </div>
              @if(!empty(session('sukses')))
              <div class="ms-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('sukses') }} 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
               @endif 
              @if(!empty(session('gagal')))
              <div class="ms-auto">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('gagal') }} 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
               @endif 
              </div>
            <!-- <img src="dark-black-orange-3d-abstract-wallpaper-free-photo.jpg" alt="" class="rounded-2"> -->
          </div> 
 
              <!-- <img src="dark-black-orange-3d-abstract-wallpaper-free-photo.jpg" alt="" class="rounded-2"> -->
            </div>
            </div>
            </section>

    <!-- card main -->
    <section id="card-main" class="mines100 mb-3">
        <div class="container">
            <div class="row"> 
                <div class="col-md-3 mb-3">
                   <div class="col">
                    <ul class="list-group  rounded">
                      <li class="list-group-item fw-medium" data-target="info-pribadi"><img src="{{ url('user/img/user.png') }}" alt="" class="icon20">Informasi Pribadi</li>
                      <li class="list-group-item fw-medium" data-target="berkas"><img src="{{ url('user/img/documents-folder.png') }}" alt="" class="icon20">Perlengkapan Berkas</li>
                      <li class="list-group-item fw-medium" data-target="pengaturan"><img src="{{ url('user/img/gear.png') }}" alt="" class="icon20">Pengaturan</li>
                      <li class="list-group-item fw-medium"><a href="{{ url('/logout') }}" class="nav-link"><img src="{{ url('user/img/logout.png') }}" alt="" class="icon20">Keluar</a></li> 
                    </ul>
                  </div>
                </div>
                
                <div class="col-md-9 content-div active-div" id="info-pribadi">
                    <div class="card">
                        <div class="card-header bg-body fw-bold d-flex justify-content-between align-items-center">
                          Informasi Pribadi
                          <button class="btn btn-sm btn-warning ms-auto fw-medium"  id="btn-lengkapi-data">Lengkapi data</button>
                        </div>
                        <div class="py-2"> 
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Nama</p>
                              <h6 class="card-title">{{ Auth::user()->nama }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Email</p>
                              <h6 class="card-title">{{ Auth::user()->email }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Tanggal Lahir</p>
                              <h6 class="card-title">{{ Auth::user()->tanggal_lahir }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Nomor hp</p>
                              <h6 class="card-title">{{ Auth::user()->no_hp }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Alamat</p>
                              <h6 class="card-title">{{ Auth::user()->alamat }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">RT, RW</p>
                              <h6 class="card-title">{{ Auth::user()->rt }}, {{ Auth::user()->rw }}</h6> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <p class="card-text mb-0">Kota, Provinsi</p>
                              <h6 class="card-title">{{ Auth::user()->kota }}, {{ Auth::user()->provinsi }}</h6> 
                          </div>  
                        </div> 
                      
                    </div>
                </div>
                 

                <div class="col-md-9 content-div hidden-div" id="lengkapi_data"> 
                  <div class="card">
                    <div class="card-header bg-body fw-bold fw-bold d-flex justify-content-between align-items-center gap-2">
                      Informasi Pribadi 
                      <a href="{{ url('/profile') }}" class="ms-auto"><button class="btn btn-sm btn-warning fw-medium " >Kembali</button></a>
                      
                    </div>
                    <div class="py-2">
                      <div class="card-body py-0 mb-2"> 
                        <form action="{{ url('/updateprofile') }}" method="POST">
                          @csrf
                          <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama" value="{{ old('nama',Auth::user()->nama)  }}">  
                              @error('nama')
                               <p style="font-size: .8rem; color: black">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email',Auth::user()->email) }}" readonly>  
                              @error('email')
                               <p style="font-size: .8rem; color: black">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="tanggal_lahir" placeholder="date" value="{{ old('tanggal_lahir',date('Y-m-d', strtotime(Auth::user()->tanggal_lahir))) }}">  
                              @error('date')
                               <p style="font-size: .8rem; color: black">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="row">
                          <div class="mb-3 col-md-3">
                            <label class="form-label">Nomor Hp</label>
                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="no_hp" value="{{ old('no_hp',Auth::user()->no_hp) }}">  
                              @error('no_hp')
                               <p style="font-size: .8rem; color: black">{{ $message }}</p>
                              @enderror
                          </div> 
                            <div class="mb-3 col-md-3">
                              <label class="form-label">Alamat</label>
                              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="alamat" value="{{ old('alamat',Auth::user()->alamat) }}">  
                                @error('alamat')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                              <label class="form-label">RT</label>
                              <input type="number" class="form-control @error('rt') is-invalid @enderror" name="rt" placeholder="rt" value="{{ old('rt',Auth::user()->rt) }}">  
                                @error('rt')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                              <label class="form-label">RW</label>
                              <input type="number" class="form-control @error('rw') is-invalid @enderror" name="rw" placeholder="rw" value="{{ old('rw',Auth::user()->rw)  }}">  
                                @error('rw')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                          </div> 

                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label class="form-label">Kota</label>
                              <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" placeholder="kota" value="{{ old('kota',Auth::user()->kota) }}">  
                                @error('kota')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label">Provinsi</label>
                              <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" placeholder="provinsi" value="{{ old('provinsi',Auth::user()->provinsi) }}">  
                                @error('provinsi')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>  
                          </div>

                          <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Simpan</button>
                        </form>
                      </div>
                    </div>
                </div> 
                </div> 

                <div class="col-md-9 content-div hidden-div" id="berkas"> 
                  <div class="card">
                    <div class="card-header bg-body fw-bold">
                      Perlengkapan Berkas
                    </div>
                    <div class="py-2">
                      <div class="card-body py-0 mb-2"> 
                          <form action="{{ url('/updateperlengkapanberkas') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-md-12">
                              <div class="d-flex">
                                <label class="form-label">KTP</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->ktp }}</label> @endif
                              </div>
                              <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" placeholder="KTP">  
                                @error('ktp')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                              <div class="d-flex">
                                <label class="form-label">CV</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->cv }}</label> @endif
                              </div>
                              <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="cv">  
                                @error('cv')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                              <div class="d-flex">
                                <label class="form-label">Ijazah</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->ijazah }}</label> @endif
                              </div> 
                              <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" placeholder="ijazah">  
                                @error('ijazah')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                              <div class="d-flex">
                                <label class="form-label">Dokumen pendukung</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->dokumen_pendukung }}</label> @endif
                              </div>  
                              <input type="file" class="form-control @error('dokumen_pendukung') is-invalid @enderror" name="dokumen_pendukung" placeholder="dokumen_pendukung">  
                                @error('dokumen_pendukung')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Update Dokumen</button>
                          </form>
                      </div>
                    </div>
                </div> 
                </div> 

                <div class="col-md-9 content-div hidden-div" id="pengaturan"> 
                  <div class="card">
                    <div class="card-header bg-body fw-bold">
                      Pengaturan
                    </div>
                    <div class="py-2">
                      <div class="card-body py-0 mb-2"> 
                          <form action="{{ url('/updatepassword') }}" method="POST">
                            @csrf
                            <div class="mb-3 col-md-6">
                              <label class="form-label">Password lama</label>
                              <input type="text" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" placeholder="Password Lama">  
                                @error('password_lama')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label">Password baru</label>
                              <input type="text" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" placeholder="Password Baru">  
                                @error('password_baru')
                                 <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Update Password</button>
                          </form>
                      </div>
                    </div>
                </div>   
                
            </div>
        </div>
    </section>
 
@endsection