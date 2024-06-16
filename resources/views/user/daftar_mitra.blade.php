@extends('layouts.user.app')
@section('content-dashboard')

    <!-- hero -->
    <section id="hero" class="mb-3">
        <div class="container-fluid">
          <div class="heroes-content  rounded-2 d-flex align-items-center">
              <div class="container"> 
                    <h1 class="text-white fw-bold mb-0">Pendaftaran Mitra</h1>
                    <span class="text-white">Bergabung untuk menjadi bagian dari kami</span> 
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
        </div>
    </section>

    <!-- card main -->
    <section id="card-main" class="mines100 mb-3">
        <div class="container">
            <div class="row "> 
                <div class="col-md-3 mb-3">
                  <div class="card">
                    <div class="card-header fw-bold">
                      Persyaratan
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item fw-medium" data-target="penting">Penting</li> 
                      <li class="list-group-item" data-target="administrasi">Administrasi</li> 
                    </ul>
                  </div>
                </div>
                
                <div class="col-md-9 content-div active-div" id="penting">
                    <div class="card">
                        <div class="card-header bg-body fw-bold d-flex justify-content-between align-items-center">
                          Baca dahulu sebelum bergabung 
                        </div>
                        <div class="py-2"> 
                          <div class="card-body pt-0 pb-1 mb-2">
                              <h6 class="card-text mb-0">Nama Perusahaan</h6>
                              <p class="card-title">Nama perusahaan terdaftar bisa CV, PT atau UMKM</p> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                              <h6 class="card-text mb-0">Deskripsi Perusahaan</h6>
                              <p class="card-title">Jelaskan kurang lebihnya 2 kalimat tentang perusahaan yang sedang di ajukan</p> 
                          </div>
                          <div class="card-body pt-0 pb-1 mb-2">
                            <h6 class="card-text mb-0">Karakteristik Perusahaan</h6>
                            <p class="card-title">Bisa disebutkan ciri-ciri Karakteristik perusahaan</p> 
                          </div> 
                          <div class="card-body pt-0 pb-1 mb-2">
                              <h6 class="card-text mb-0">Alamat Perusahaan</h6>
                              <p class="card-title"></p> 
                          </div> 
                          <div class="card-body pt-0 pb-1 mb-2">
                              <h6 class="card-text mb-0">Latar belakang Pengajuan</h6>
                              <p class="card-title">Sebutkan apa saja alasan mengajukan perusahaan</p> 
                          </div>  
                        </div> 
                      
                    </div>
                </div>

                {{-- @if (!empty($getMitra))
                  <div class="col-md-9">
                    <div class="row">
                      <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div>
                          Proses pengajuan mitra anda belum di setujui
                        </div>
                      </div>
                    </div>
                  </div>
                @else --}}
                   <div class="col-md-9 content-div hidden-div" id="administrasi">
                    @if(!empty($getMitra)) 
                     @if (!empty($getMitra->is_aktif === 0)) 
                        <div class="row">
                          <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <div>
                              Proses pengajuan mitra anda belum di setujui
                            </div>
                          </div>
                        </div> 
                      @elseif(!empty($getMitra->is_aktif === 1))
                        <div class="row">
                          <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div>
                              <a href="{{ url('/login') }}" class="alert-link">Login akun mitra</a> 
                            </div>
                          </div>
                          <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div>
                              <p>Email : <span class="fw-medium">{{ $getMitra->email }}</span></p>
                              <p>Username : <span class="fw-medium">{{ $getMitra->username }}</span></p>
                              <p>Password : <span class="fw-medium">{{ $getMitra->password_mentah }}</span></p> 
                            </div>
                          </div>
                        </div> 
                      @else
                      <div class="card">
                          <div class="card-header bg-body fw-bold d-flex justify-content-between align-items-center">
                            Administrasi
                          </div>
                          <div class="py-2"> 
                            <div class="card-body py-0 mb-2"> 
                              <form action="" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label">Nama Perusahaan</label>
                                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama">
                                    @error('nama')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Perusahaan</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">
                                      @error('email')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-md-3 mb-3">
                                    <label class="form-label">Nomor Hp Perusahaan</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="no_hp">
                                      @error('no_hp')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-md-3 mb-3">
                                    <label class="form-label">Tahun berdiri</label>
                                    <input type="date" class="form-control @error('tahun_berdiri') is-invalid @enderror" name="tahun_berdiri" placeholder="tahun_berdiri">
                                      @error('tahun_berdiri')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Deskripsi Perusahaan</label> 
                                  <textarea name="deskripsi_perusahaan" class="form-control @error('deskripsi_perusahaan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                    @error('deskripsi_perusahaan')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">karakteristik Perusahaan</label> 
                                  <textarea name="karakteristik_perusahaan" class="form-control @error('karakteristik_perusahaan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                    @error('karakteristik_perusahaan')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Latarbelakang Pengajuan</label> 
                                  <textarea name="latarbelakang_pengajuan" class="form-control @error('latarbelakang_pengajuan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                    @error('latarbelakang_pengajuan')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div> 
                                <div class="row"> 
                                  <div class="mb-3 col-md-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="alamat" >  
                                      @error('alamat')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                
                                  <div class="mb-3 col-md-3">
                                    <label class="form-label">RT</label>
                                    <input type="number" class="form-control @error('rt') is-invalid @enderror" name="rt" placeholder="rt">  
                                      @error('rt')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-3">
                                    <label class="form-label">RW</label>
                                    <input type="number" class="form-control @error('rw') is-invalid @enderror" name="rw" placeholder="rw" >  
                                      @error('rw')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label">Kota</label>
                                    <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" placeholder="kota" >  
                                      @error('kota')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label">Provinsi</label>
                                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" placeholder="provinsi" >  
                                      @error('provinsi')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>  
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username" >  
                                      @error('username')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" >  
                                      @error('password')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>  
                                </div>
      
                                <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Ajukan</button>
                              </form>
                            </div>
                          </div> 
                        
                      </div> 
                      @endif
                      @else
                      <div class="card">
                        <div class="card-header bg-body fw-bold d-flex justify-content-between align-items-center">
                          Administrasi
                        </div>
                        <div class="py-2"> 
                          <div class="card-body py-0 mb-2"> 
                            <form action="" method="POST">
                              @csrf
                              <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama">
                                  @error('nama')
                                  <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Email Perusahaan</label>
                                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">
                                    @error('email')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                  <label class="form-label">Nomor Hp Perusahaan</label>
                                  <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="no_hp">
                                    @error('no_hp')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                  <label class="form-label">Tahun berdiri</label>
                                  <input type="date" class="form-control @error('tahun_berdiri') is-invalid @enderror" name="tahun_berdiri" placeholder="tahun_berdiri">
                                    @error('tahun_berdiri')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label> 
                                <textarea name="deskripsi_perusahaan" class="form-control @error('deskripsi_perusahaan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                  @error('deskripsi_perusahaan')
                                  <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                <label class="form-label">karakteristik Perusahaan</label> 
                                <textarea name="karakteristik_perusahaan" class="form-control @error('karakteristik_perusahaan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                  @error('karakteristik_perusahaan')
                                  <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Latarbelakang Pengajuan</label> 
                                <textarea name="latarbelakang_pengajuan" class="form-control @error('latarbelakang_pengajuan') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                  @error('latarbelakang_pengajuan')
                                  <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                  @enderror
                              </div> 
                              <div class="row"> 
                                <div class="mb-3 col-md-3">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="alamat" >  
                                    @error('alamat')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="mb-3 col-md-3">
                                  <label class="form-label">RT</label>
                                  <input type="number" class="form-control @error('rt') is-invalid @enderror" name="rt" placeholder="rt">  
                                    @error('rt')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                  <label class="form-label">RW</label>
                                  <input type="number" class="form-control @error('rw') is-invalid @enderror" name="rw" placeholder="rw" >  
                                    @error('rw')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                              </div>  
                              <div class="row">
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Kota</label>
                                  <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" placeholder="kota" >  
                                    @error('kota')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Provinsi</label>
                                  <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" placeholder="provinsi" >  
                                    @error('provinsi')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>  
                              </div>
                              <div class="row">
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username" >  
                                    @error('username')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Password</label>
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" >  
                                    @error('password')
                                    <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                    @enderror
                                </div>  
                              </div>
    
                              <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Ajukan</button>
                            </form>
                          </div>
                        </div> 
                      
                    </div> 
                      @endif
                    </div>                   
                {{-- @endif --}}

            </div>
        </div>
    </section>
 
@endsection