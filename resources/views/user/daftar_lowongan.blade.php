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
    {{-- <section id="search" class="mines30 mb-4"> 
        <div class="container">
            <div class="row">
                <form class="d-flex input-container" role="search">
                    <input class="form-control search-input" type="search" placeholder="Cari Pekerjaan" aria-label="Search">
                    <button class="btn text-white search-btn" type="submit"><img src="{{ url('user/img/search.png') }}" alt=""></button> 
                  </form>
            </div>
        </div>
    </section> --}}

    <!-- card main -->
    <section id="card-main" class="mb-3">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8 mb-3">
                  <a href="{{ url('/') }}">
                    <div class="search-btn-mini-30 mb-2">
                      <img class="img rotate-180" src="{{ url('user/img/arrow-right.png') }}" alt="" srcset="">
                    </div>
                  </a>
              
                    <div class="card p-2 border mb-3">
                        <div class="card-header bg-body d-flex align-items-center  fw-bold">
                          Results  
                        </div>
                        
                        {{-- <a href="{{ url('/lowongan/id='.$getRecord->id) }}" class="text-decoration-none border-bottom">  --}}
                        <div class="card-body d-flex gap-2 ">
                          <div>
                            <img src="{{ url('user/img/work-in-progress.png') }}" class="logo-mitra" alt="">
                          </div>
                          <div class="pb-1">
                            <h5 class="card-title text-secondary">{{ $getRecord->nama_lowongan }}</h5>
                            <h6 class="card-text text-secondary" style="font-size: .8rem;">{{ $getRecord->nama_mitra }}</h6>
                            <p class="card-text multiline-ellipsis text-secondary" style="font-size: .9rem;">{{ $getRecord->deskripsi_lowongan }}</p>
                            <h6 class="card-text   fw-bold text-secondary" style="font-size: .8rem;">{{ $getRecord->gaji_batas_awal }} - {{ $getRecord->gaji_batas_akhir }}</h6>
                            <h6 class="card-text  fw-bold text-secondary" style="font-size: .8rem;">{{ $getRecord->tipe_lowongan }}</h6>
                            @if(!empty($cekUserPelamar))
                            {{-- {{ $cekUserPelamar }} --}}
                            @if ($cekUserPelamar->is_aktif == 0)
                            <button class="btn btn-info disabled">Belum Diterima Sedang diproses</button>
                            @elseif($cekUserPelamar->is_aktif == 1)  
                                <button class="btn btn-danger disabled">Ditolak</button>
                            @elseif($cekUserPelamar->is_aktif == 2)  
                                <button class="btn btn-success disabled">Diterima</button>
                                <button class="btn btn-success disabled">Anda Akan dihubungi lebih lanjut</button>
                                <div class="card bg-success disabled mt-3 col-md-12 text-white">
                                  <div class="card-body">
                                    <p class="fw-bold">atau Silahkan Hubungi</p>
                                    <p><b>Nama Perusahaan :</b> {{ $cekUserPelamar->mitrasnama }}</p> 
                                    <p><b>Email :</b> {{ $cekUserPelamar->mitrasemail }}</p>
                                    <p><b>No Hp :</b> {{ $cekUserPelamar->mitrasno_hp }}</p>
                                  </div>
                                </div>
                            @endif
                            
                            {{-- <button class="btn text-white mt-3 btn-success disabled" style="">Sedang diproses </button>
                            @else
                            <button class="btn text-white mt-3" style="background-color: black">Daftar</button> --}}
                            @endif
                          </div>
                        </div> 
                      {{-- </a> --}}
 
                        </div>

                        @if(empty($cekUserPelamar))
                        <div class="card p-2 border">
                            <div class="card-header bg-body d-flex align-items-center  fw-bold">
                              Kirim Berkas
                              <span class="ms-auto">pilih berkas jika ingin mengganti yang lama</span>
                            </div>
                            
                            {{-- <a href="{{ url('/lowongan/id='.$getRecord->id) }}" class="text-decoration-none border-bottom">  --}}
                              @if(!empty($getDokumen))
                              <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" class="form-control @error('mitra_id') is-invalid @enderror" name="mitra_id" placeholder="mitra_id" value="{{ $getRecord->mitra_id }}">  
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">KTP</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->ktp }}</label> @endif
                                    </div>
                                    <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" placeholder="KTP" value="{{ $getDokumen->ktp }}">  
                                    <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" placeholder="KTP" value="{{ $getDokumen->ktp }}">  
                                      @error('ktp')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">CV</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->cv }}</label> @endif
                                    </div>
                                    <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="cv" value="{{ old('cv',$getDokumen->cv) }}">  
                                    <input type="text" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="cv" value="{{ old('cv',$getDokumen->cv) }}">  
                                      @error('cv')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Ijazah</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->ijazah }}</label> @endif
                                    </div> 
                                    <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" placeholder="ijazah" value="{{ old('ijazah',$getDokumen->ijazah) }}">  
                                    <input type="text" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" placeholder="ijazah" value="{{ old('ijazah',$getDokumen->ijazah) }}">  
                                      @error('ijazah')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Dokumen pendukung</label> @if (!empty($getDokumen))<label for="" class="ms-auto" style="font-size: .8rem">{{  $getDokumen->dokumen_pendukung }}</label> @endif
                                    </div>  
                                    <input type="file" class="form-control @error('dokumen_pendukung') is-invalid @enderror" name="dokumen_pendukung" placeholder="dokumen_pendukung" value="{{ old('dokumen_pendukung',$getDokumen->dokumen_pendukung) }}">  
                                    <input type="text" class="form-control @error('dokumen_pendukung') is-invalid @enderror" name="dokumen_pendukung" placeholder="dokumen_pendukung" value="{{ old('dokumen_pendukung',$getDokumen->dokumen_pendukung) }}">  
                                      @error('dokumen_pendukung')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Keterangan Lainnya</label>
                                    </div>  
                                    <textarea name="keterangan_lainnya" id="" cols="30" rows="3" class="form-control @error('keterangan_lainnya') is-invalid @enderror" value="{{ old('dokumen_pendukung',$getDokumen->dokumen_pendukung) }}">{{ $getDokumen->dokumen_pendukung }}</textarea>
                                      @error('keterangan_lainnya')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div> 
                                  <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Daftar</button>
                                </form>
                              </div> 
                              @else
                              <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" class="form-control @error('mitra_id') is-invalid @enderror" name="mitra_id" placeholder="mitra_id" value="{{ $getRecord->mitra_id }}">  
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">KTP</label> 
                                    </div>
                                    <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" placeholder="KTP">  
                                    <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" placeholder="KTP">  
                                      @error('ktp')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">CV</label> 
                                    </div>
                                    <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="cv" >  
                                    <input type="text" class="form-control @error('cv') is-invalid @enderror" name="cv" placeholder="cv" >  
                                      @error('cv')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Ijazah</label> 
                                    </div> 
                                    <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" placeholder="ijazah">  
                                    <input type="text" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" placeholder="ijazah">  
                                      @error('ijazah')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Dokumen pendukung</label> 
                                    </div>  
                                    <input type="file" class="form-control @error('dokumen_pendukung') is-invalid @enderror" name="dokumen_pendukung" placeholder="dokumen_pendukung" >  
                                    <input type="text" class="form-control @error('dokumen_pendukung') is-invalid @enderror" name="dokumen_pendukung" placeholder="dokumen_pendukung" >  
                                      @error('dokumen_pendukung')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="mb-3 col-md-12">
                                    <div class="d-flex">
                                      <label class="form-label">Keterangan Lainnya</label>
                                    </div>  
                                    <textarea name="keterangan_lainnya" id="" cols="30" rows="3" class="form-control @error('keterangan_lainnya') is-invalid @enderror" ></textarea>
                                      @error('keterangan_lainnya')
                                      <p style="font-size: .8rem; color: black">{{ $message }}</p>
                                      @enderror
                                  </div> 
                                  <button class="btn btn-sm btn-success  fw-medium"  id="btn-lengkapi-data">Daftar</button>
                                </form>
                              </div> 
                              @endif
                          {{-- </a> --}}
    
                        </div>
                        @endif


                </div>
                
             
            </div>
        </div>
    </section>

@endsection