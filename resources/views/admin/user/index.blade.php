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
                                <a href="{{ url('admin/kelola_user/tambah') }}">Tambah</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Nomor HP</th>
                                    <th>Email</th>
                                    <th>Alamat Lengkap</th> 
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                                @forelse ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->foto }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->no_hp }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->alamat }}</td> 
                                    <td>
                                        @if ($value->is_aktif == 0)
                                            <button class="ds-setting">Nonaktive</button>
                                        @elseif($value->is_aktif == 1)  
                                            <button class="pd-setting">Active</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/kelola_user/edit/id='.$value->id) }}">
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ url('admin/kelola_user/delete/id='.$value->id) }}">
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