@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Dashboard Mitra</h2>
        <p>Dashboard haahaa</p> 
    </div> 
@endsection

@section('content-dashboard')
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                    <a href="{{ url('/mitra/kelola_lowongan') }}">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Total Lowongan</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet"> 
                                <div class="col-xs-12 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin">{{ $countLowongan }}</h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                    </a>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection