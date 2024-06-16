@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola Lowongan</h2> 
    </div> 
@endsection

@section('content-dashboard')     
     <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>List Lowongan</h4>
                            <div class="add-product">
                                <a href="{{ url('mitra/kelola_lowongan/tambah') }}">Tambah</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Nama mitra</th>
                                    <th>Nama lowongan</th>
                                    <th>Lokasi lowongan</th>
                                    <th>Deskripsi lowongan</th>
                                    <th>Kriteria lowongan</th>
                                    <th>Gaji</th>
                                    <th>Level</th> 
                                    <th>Tipe</th> 
                                    <th>Kategori</th> 
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                                @forelse ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->nama_mitra }}</td>
                                    <td>{{ $value->nama_lowongan }}</td>
                                    <td>{{ $value->lokasi_lowongan }}</td>
                                    <td  class="multiline-ellipsis">{{ $value->deskripsi_lowongan }}</td>
                                    <td  class="multiline-ellipsis">{{ $value->kriteria_lowongan }}</td>
                                    <td>{{ $value->gaji_batas_awal }} {{ $value->gaji_batas_akhir }}</td>
                                    <td>{{ $value->level_lowongan }}</td>
                                    <td>{{ $value->tipe_lowongan }}</td> 
                                    <td>{{ $value->kategori_lowongan }}</td> 
                                    <td>
                                        @if ($value->is_aktif == 0)
                                            <button class="ds-setting">Nonaktive</button>
                                        @elseif($value->is_aktif == 1)  
                                            <button class="pd-setting">Active</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('mitra/kelola_lowongan/id='.$value->id) }}">
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed">kelola</button>
                                        </a>
                                        <a href="{{ url('mitra/kelola_lowongan/edit/id='.$value->id) }}">
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ url('mitra/kelola_lowongan/delete/id='.$value->id) }}">
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