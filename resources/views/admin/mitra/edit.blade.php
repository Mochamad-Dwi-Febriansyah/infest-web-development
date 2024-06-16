@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola Mitra</h2> 
    </div> 
@endsection

@section('content-dashboard')     
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                              <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i>Edit mitra</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit"> 
                            <div class="product-tab-list">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                           <form action="" method="POST">
                                            @csrf
                                            <div class="card-block"> 
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon">Nama</span>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{ old('nama',$getRecord->nama) }}">
                                                    @error('nama')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Email</span>
                                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email',$getRecord->email) }}" readonly>
                                                    @error('email')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon">Nomor Hp</span>
                                                    <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" placeholder="Nomor hp" name="no_hp" value="{{ old('no_hp',$getRecord->no_hp) }}">
                                                    @error('no_hp')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Tahun Berdiri</span>
                                                    <input type="date" class="form-control  @error('tahun_berdiri') is-invalid @enderror" placeholder="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri',$getRecord->tahun_berdiri) }}">
                                                    @error('tahun_berdiri')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Deskripsi</span>
                                                    <textarea name="deskripsi_perusahaan" class="form-control  @error('deskripsi_perusahaan') is-invalid @enderror" id="" cols="30" rows="3">{{ old('deskripsi_perusahaan',$getRecord->deskripsi_perusahaan) }}</textarea> 
                                                    @error('deskripsi_perusahaan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Karakteristik Perusahaan</span>
                                                    <textarea name="karakteristik_perusahaan" class="form-control  @error('karakteristik_perusahaan') is-invalid @enderror" id="" cols="30" rows="3">{{ old('karakteristik_perusahaan',$getRecord->karakteristik_perusahaan) }}</textarea> 
                                                    @error('karakteristik_perusahaan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Latarbelakang Perusahaan</span>
                                                    <textarea name="latarbelakang_perusahaan" class="form-control  @error('latarbelakang_perusahaan') is-invalid @enderror" id="" cols="30" rows="3">{{ old('latarbelakang_perusahaan',$getRecord->latarbelakang_perusahaan) }}</textarea> 
                                                    @error('latarbelakang_perusahaan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Alamat</span>
                                                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror" placeholder="alamat" name="alamat" value="{{ old('alamat',$getRecord->alamat) }}">
                                                    @error('alamat')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">RT</span>
                                                    <input type="text" class="form-control  @error('rt') is-invalid @enderror" placeholder="rt" name="rt" value="{{ old('rt',$getRecord->rt) }}">
                                                    @error('rt')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">RW</span>
                                                    <input type="text" class="form-control  @error('rw') is-invalid @enderror" placeholder="rw" name="rw" value="{{ old('rw',$getRecord->rw) }}">
                                                    @error('rw')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Kota</span>
                                                    <input type="text" class="form-control  @error('kota') is-invalid @enderror" placeholder="kota" name="kota" value="{{ old('kota',$getRecord->kota) }}">
                                                    @error('kota')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Provinsi</span>
                                                    <input type="text" class="form-control  @error('provinsi') is-invalid @enderror" placeholder="provinsi" name="provinsi" value="{{ old('provinsi',$getRecord->provinsi) }}">
                                                    @error('provinsi')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="is_aktif" class="form-control @error('is_aktif') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Nonaktif</option>
                                                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Aktif</option>
                                                    </select>
                                                    @error('is_aktif')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                {{-- <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Username</span>
                                                    <input type="text" class="form-control  @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username',$getRecord->username) }}">
                                                    @error('username')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>  --}}
                                                {{-- <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password',$getRecord->password) }}>
                                                    @error('password')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>  --}}
                                                <div class="form-group review-pro-edt mg-b-0-pt">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Update
                                                        </button>
                                                </div>
                                            </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection