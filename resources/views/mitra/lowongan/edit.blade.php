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
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control @error('nama_lowongan') is-invalid @enderror" placeholder="nama_lowongan" name="nama_lowongan" value="{{ old('nama_lowongan',$getRecord->nama_lowongan) }}">
                                                    @error('nama_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('lokasi_lowongan') is-invalid @enderror" placeholder="lokasi_lowongan" name="lokasi_lowongan" value="{{ old('lokasi_lowongan',$getRecord->lokasi_lowongan) }}">
                                                    @error('lokasi_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('deskripsi_lowongan') is-invalid @enderror" placeholder="Nomor hp" name="deskripsi_lowongan" value="{{ old('deskripsi_lowongan',$getRecord->deskripsi_lowongan) }}">
                                                    @error('deskripsi_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('kriteria_lowongan') is-invalid @enderror" placeholder="kriteria_lowongan" name="kriteria_lowongan" value="{{ old('kriteria_lowongan',$getRecord->kriteria_lowongan) }}">
                                                    @error('kriteria_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="number" class="form-control  @error('gaji_batas_awal') is-invalid @enderror" placeholder="gaji_batas_awal" name="gaji_batas_awal" value="{{ old('gaji_batas_awal',$getRecord->gaji_batas_awal) }}">
                                                    @error('gaji_batas_awal')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div> 
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="number" class="form-control  @error('gaji_batas_akhir') is-invalid @enderror" placeholder="gaji_batas_akhir" name="gaji_batas_akhir" value="{{ old('gaji_batas_akhir',$getRecord->gaji_batas_akhir) }}">
                                                    @error('gaji_batas_akhir')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>  
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Level lowongan</span>
                                                    <select name="level_lowongan" class="form-control @error('level_lowongan') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->level_lowongan == 0) ? 'selected' : '' }}   value="0">Dasar</option>
                                                        <option {{ ($getRecord->level_lowongan == 1) ? 'selected' : '' }}  value="1">Menengah</option>
                                                        <option {{ ($getRecord->level_lowongan == 2) ? 'selected' : '' }}  value="2">Sulit</option>
                                                    </select>
                                                    @error('level_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Tipe lowongan</span>
                                                    <select name="tipe_lowongan" class="form-control @error('tipe_lowongan') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->tipe_lowongan == 2) ? 'selected' : '' }}  value="0">Paruh waktu</option>
                                                        <option {{ ($getRecord->tipe_lowongan == 2) ? 'selected' : '' }}  value="1">Penuh wakto</option>
                                                        <option {{ ($getRecord->tipe_lowongan == 2) ? 'selected' : '' }}  value="2">Remote</option>
                                                    </select>
                                                    @error('tipe_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Kategori lowongan</span>
                                                    <select name="kategori_lowongan" class="form-control @error('kategori_lowongan') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->kategori_lowongan == 2) ? 'selected' : '' }}  value="0">Desain</option>
                                                        <option {{ ($getRecord->kategori_lowongan == 2) ? 'selected' : '' }}  value="1">Program</option>
                                                        <option {{ ($getRecord->kategori_lowongan == 2) ? 'selected' : '' }}  value="2">AI</option>
                                                    </select>
                                                    @error('kategori_lowongan')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="is_aktif" class="form-control @error('is_aktif') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->level_lowongan == 2) ? 'selected' : '' }} value="0">Nonaktif</option>
                                                        <option {{ ($getRecord->level_lowongan == 2) ? 'selected' : '' }} value="1">Aktif</option>
                                                    </select>
                                                    @error('is_aktif')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
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