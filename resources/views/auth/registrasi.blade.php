@extends('layouts.auth.index')
@section('content-auth')
<div class="row d-flex align-items-center">
    <div class="col-md-3 min-margin">
        <img class="img-login" src="{{ url('auth/img/work-in-progress.png') }}" alt="">
    </div>
    <div class="col-md-9">
        <div class="card bg-transparent shadow backdrop-filter"> 
        <div class="card-body">
            @if(!empty(session('gagal')))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('gagal') }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif
            <h2 class="mb-4 text-white">Register JobReseacher</h2> 
            <form action="" method="POST" >
                @csrf
                <div class="d-flex gap-2">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama">
                        @error('nama')
                            <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username">  
                        @error('username')
                        <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">  
                    @error('email')
                    <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password">
                    @error('password')
                    <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                @enderror
                </div> 
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                    @error('tanggal_lahir')
                    <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                @enderror
                </div>  
                <div class="mb-3">
                    <label class="form-label">Nomor Hp</label>
                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp">
                    @error('no_hp')
                    <p class="mb-0 bg-warning border-radius rounded px-2" style="font-size: .8rem; color: black">{{ $message }}</p>
                @enderror
                </div>  
                <p><a href="{{ url('/login') }}" class="link-warning">Login</a></p> 
                <button type="submit" class="btn btn-warning fw-bold">Registrasi</button>
            </form>
        </div>
        </div>
    </div>
</div> 
@endsection