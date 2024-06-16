@extends('layouts.auth.index')
@section('content-auth')
<div class="row d-flex align-items-center">
    <div class="col-md-3 min-margin">
        <img class="img-login" src="{{ url('auth/img/work-in-progress.png') }}" alt="">
    </div>
    <div class="col-md-9">
        <div class="card bg-transparent shadow backdrop-filter"> 
        <div class="card-body">
            @if(!empty(session('sukses')))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif
            @if(!empty(session('gagal')))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('gagal') }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif
            <h2 class="mb-4 text-white">Login JobReseacher</h2> 
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username atau email</label>
                    <input type="text" class="form-control" name="username" placeholder="username/email">  
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div> 
                <p><a href="{{ url('/registrasi') }}" class="link-warning">Registrasi</a></p> 
                <button type="submit" class="btn btn-warning fw-bold">Masuk</button>
            </form>
        </div>
        </div>
    </div>
</div> 
@endsection