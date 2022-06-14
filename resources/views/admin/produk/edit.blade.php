@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Edit Data Produk</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="/admin/dataProduk/edit/{{ $produk->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama">Nama Produk :</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-select form-select-sm @error('kategori') is-invalid @enderror" aria-label="Form Pemesanan">
                            <option selected value="{{ old('kategori', $produk->kategori) }}">{{ old('kategori', $produk->kategori) }}</option>
                            <option value="{{ $produk->kategori === 'Bahan' ? 'Alat' : 'Bahan' }}">{{ $produk->kategori === 'Bahan' ? 'Alat' : 'Bahan' }}</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Stok" value="{{ old('stok', $produk->stok) }}" required>
                        @error('stok')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="harga">Harga Satuan</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Harga Satuan" value="{{ old('harga', $produk->harga) }}" required>
                        @error('harga')
                            <div class="invalid-feedback">
                                    {{ $message }}   
                            </div>
                        @enderror                        
                    </div>
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection