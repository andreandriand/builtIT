@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Input Data User Baru</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="/admin/dataUser/tambah" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama">Nama Pengguna :</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            placeholder="Nama Pengguna" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="role">Role :</label>
                        <select name="role" class="form-select form-select-sm @error('role') is-invalid @enderror"
                            aria-label="Form Pemesanan">
                            <option selected value="">-- Pilih Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="Kasir">Kasir</option>
                            <option value="User">User</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
