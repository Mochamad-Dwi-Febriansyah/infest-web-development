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
                              <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i>Tambah mitra</a></li>
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
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama">
                                                    @error('nama')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                                    @error('email')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="number" class="form-control  @error('no_hp') is-invalid @enderror" placeholder="Nomor hp" name="no_hp">
                                                    @error('no_hp')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="date" class="form-control  @error('tahun_berdiri') is-invalid @enderror" placeholder="tahun_berdiri" name="tahun_berdiri">
                                                    @error('tahun_berdiri')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('deskripsi_perusahaan') is-invalid @enderror" placeholder="deskripsi_perusahaan" name="deskripsi_perusahaan">
                                                    @error('deskripsi_perusahaan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('karakteristik_perusahaan') is-invalid @enderror" placeholder="karakteristik_perusahaan" name="karakteristik_perusahaan">
                                                    @error('karakteristik_perusahaan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('latarbelakang_pengajuan') is-invalid @enderror" placeholder="latarbelakang_pengajuan" name="latarbelakang_pengajuan">
                                                    @error('latarbelakang_pengajuan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>  
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('rt') is-invalid @enderror" placeholder="rt" name="rt">
                                                    @error('rt')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('rw') is-invalid @enderror" placeholder="rw" name="rw">
                                                    @error('rw')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('kota') is-invalid @enderror" placeholder="kota" name="kota">
                                                    @error('kota')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('provinsi') is-invalid @enderror" placeholder="provinsi" name="provinsi">
                                                    @error('provinsi')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('username') is-invalid @enderror" placeholder="Username" name="username">
                                                    @error('username')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                                    @error('password')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="form-group review-pro-edt mg-b-0-pt">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Kirim
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