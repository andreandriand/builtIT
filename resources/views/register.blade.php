@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="fw-bold">Registrasi</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama : </label>
                        <input type="text" class="form-control mb-2 @error('nama') is-invalid @enderror" name="nama"
                            id="nama" aria-describedby="emailHelp" placeholder="Nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="text" class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Email Anda">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Password">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        Sudah punya akun? Login <a href="/login">disini</a>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary mt-4">Daftar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
