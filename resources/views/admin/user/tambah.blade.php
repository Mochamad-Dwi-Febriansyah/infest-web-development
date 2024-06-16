@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola User</h2> 
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
                              <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i>Tambah user</a></li>
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
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" placeholder="Nomor hp" name="no_hp">
                                                    @error('no_hp')
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
                                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                                    @error('email')
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
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"></span>
                                                    <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror"  name="tanggal_lahir">
                                                    @error('tanggal_lahir')
                                                        <p class="">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="is_aktif" class="form-control @error('is_aktif') is-invalid @enderror" id="">
                                                        <option value="0">Nonaktif</option>
                                                        <option value="1">Aktif</option>
                                                    </select>
                                                    @error('is_aktif')
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