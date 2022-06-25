@extends('layouts.kasir')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Terima Pesanan</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="/kasir/accept/{{ $pesanan->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama">Nama Pelanggan :</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama_customer" placeholder="Nama Pelanggan"
                            value="{{ old('nama_customer', $pesanan->nama_customer) }}" required>
                        @error('nama_customer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_pesan">Tanggal Pemesanan :</label>
                        <input type="datetime" class="form-control @error('tanggal_pesan') is-invalid @enderror"
                            id="tanggal_pesan" name="tanggal_pesan" placeholder="Tanggal Pemesanan"
                            value="{{ old('tanggal_pesan', $pesanan->tanggal_pesan) }}" disabled>
                        @error('tanggal_pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="produk" class="form-label">Barang :</label>
                        <select name="nama_produk"
                            class="form-select form-select-sm @error('nama_produk') is-invalid @enderror"
                            aria-label="Form Pemesanan" id="produk" required>
                            <option selected value="{{ old('nama_produk', $pesanan->nama_produk) }}">
                                {{ $pesanan->nama_produk }}
                            </option>
                            @foreach ($produk as $p)
                                @if ($p->nama_produk !== $pesanan->nama_produk)
                                    <option value="{{ $p->nama_produk }}">{{ $p->nama_produk }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="jumlah_pesan">Jumlah Pesanan</label>
                        <input type="number" class="form-control @error('jumlah_pesan') is-invalid @enderror"
                            id="jumlah_pesan" name="jumlah_pesan" placeholder="Jumlah Pesanan"
                            value="{{ old('jumlah_pesan', $pesanan->jumlah_pesan) }}" required>
                        @error('jumlah_pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="status">Status</label>
                        <select name="status" class="form-select form-select-sm @error('status') is-invalid @enderror"
                            aria-label="Form Pemesanan">
                            <option selected value="{{ old('status', $pesanan->status) }}">
                                {{ old('status', $pesanan->status) }}</option>
                            <option
                                value="{{ old('status', $pesanan->status) === 'Belum Diproses' ? 'Sudah Diproses' : 'Belum Diproses' }}">
                                {{ old('status', $pesanan->status) === 'Belum Diproses' ? 'Sudah Diproses' : 'Belum Diproses' }}
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="nama_kasir">Nama Kasir :</label>
                        <select name="nama_kasir" class="form-select form-select-sm @error('status') is-invalid @enderror"
                            aria-label="Form Pemesanan">
                            @foreach ($user as $kasir)
                                <option value="{{ old('nama_kasir', $kasir->nama) }}">
                                    {{ old('nama_kasir', $kasir->nama) }}</option>
                            @endforeach
                        </select>
                        @error('nama_kasir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Terima Pesanan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
