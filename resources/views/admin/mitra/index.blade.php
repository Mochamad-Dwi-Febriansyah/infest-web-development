@extends('layouts.dashboard.app')

@section('breadcomb-ctn')
    <div class="breadcomb-ctn">
        <h2>Kelola User</h2> 
    </div> 
@endsection

@section('content-dashboard')     
     <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>List User</h4>
                            <div class="add-product">
                                <a href="{{ url('admin/kelola_mitra/tambah') }}">Tambah</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Foto</th>
                                    <th>Tertanda</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor HP</th>
                                    <th>Tahun berdiri</th>
                                    <th>Alamat Lengkap</th> 
                                    <th>Latar belakang pengajuan</th> 
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                                @forelse ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->foto }}</td>
                                    <td>{{ $value->pembuat }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->no_hp }}</td>
                                    <td>{{ $value->tahun_berdiri }}</td>
                                    <td>{{ $value->alamat }}</td> 
                                    <td class="multiline-ellipsis">{{ $value->latarbelakang_pengajuan }}</td>
                                    <td>
                                        @if ($value->is_aktif == 0)
                                            <button class="ds-setting">Nonaktive</button>
                                        @elseif($value->is_aktif == 1)  
                                            <button class="pd-setting">Active</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/kelola_mitra/edit/id='.$value->id) }}">
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ url('admin/kelola_mitra/delete/id='.$value->id) }}">
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