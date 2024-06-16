@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola Pelamar</h2> 
    </div> 
@endsection

@section('content-dashboard')     
     <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>List Pelamar</h4>
                            {{-- <div class="add-product">
                                <a href="{{ url('mitra/kelola_lowongan/tambah') }}">Tambah</a>
                            </div> --}}
                            <table style="overflow-y: scroll">
                                <tr>  
                                    <th>Nama lowongan</th>
                                    <th>Nama Pelamar</th>
                                    <th>KTP</th>
                                    <th>CV</th>
                                    <th>Ijazah</th>
                                    <th>Dokumen Pendukung</th> 
                                    <th>Keterangan Lainnya</th> 
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                                @forelse ($getRecord as $value)
                                <tr> 
                                    <td>{{ $value->namalowongan }}</td>
                                    <td>{{ $value->usernama }}</td> 
                                    <td style="max-width: 130px; overflow: hidden">{{ $value->ktp }}</td> 
                                    <td style="max-width: 130px; overflow: hidden">{{ $value->cv }}</td> 
                                    <td style="max-width: 130px; overflow: hidden">{{ $value->ijazah }}</td> 
                                    <td style="max-width: 130px; overflow: hidden">{{ $value->dokumen_pendukung }}</td> 
                                    <td>{{ $value->keterangan_lainnya }}</td>  
                                    <td>
                                        @if ($value->is_aktif == 0)
                                            <button class="btn btn-info">Belum Diterima</button>
                                        @elseif($value->is_aktif == 1)  
                                            <button class="btn btn-danger">Ditolak</button>
                                        @elseif($value->is_aktif == 2)  
                                            <button class="btn btn-success">DIterima</button>
                                        @endif
                                    </td>
                                    <td> 
                                        <a href="{{ url('mitra/kelola_pelamar/edit/id='.$value->id) }}">
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ url('mitra/kelola_pelamar/delete/id='.$value->id) }}">
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </a>
                                    </td>
                                </tr> 
                                @empty
                                <tr>
                                    <td>Empty</td>
                                </tr>
                                @endforelse
                               
                            </table>
                            <div class="custom-pagination">
								<ul class="pagination"> 
									<li class="page-item">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
                                    </li>  
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection