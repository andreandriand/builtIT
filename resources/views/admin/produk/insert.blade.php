@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Input Data Produk Baru</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="/admin/dataProduk/tambah" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama">Nama Produk :</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama"
                            name="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk') }}" required>
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-select form-select-sm @error('kategori') is-invalid @enderror"
                            aria-label="Form Pemesanan">
                            <option selected value="">-- Pilih Kategori --</option>
                            <option value="Alat">Alat</option>
                            <option value="Bahan">Bahan</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                            placeholder="Stok" value="{{ old('stok') }}" required>
                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="harga">Harga Satuan</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            name="harga" placeholder="Harga Satuan" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                </form>
            </div>
        </div>
    </div>
@endsection
