@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola Pelamar</h2> 
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
                              <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i>Edit Pelamar</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit"> 
                            <div class="product-tab-list">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                           <form action="" method="POST">
                                            @csrf
                                            <div class="card-block">   
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon">Status</span>
                                                    <select name="is_aktif" class="form-control @error('is_aktif') is-invalid @enderror" id="">
                                                        <option {{ ($getRecord->is_aktif == 2) ? 'selected' : '' }} value="0">Belum Diterima</option>
                                                        <option {{ ($getRecord->is_aktif == 2) ? 'selected' : '' }} value="1">Ditolak</option>
                                                        <option {{ ($getRecord->is_aktif == 2) ? 'selected' : '' }} value="2">DIterima</option> 
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