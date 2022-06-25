@extends('layouts.main')

@section('content')
    <section class="bg-purple">
        @if (session()->has('success'))
            <div class="container">
                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- Jumbotron -->

    <section id="jumbotron" class="jumbotron text-center pt-5 bg-purple">
        <div class="container">
            <img src="img/1.png" alt="Gambar" width="200" class="rounded-circle" />
            <p class="lead fw-bolder fs-2">Hi, Welcome to Our Page</p>
            <p>Discover Something New Here</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path id="about" fill="#560bad" fill-opacity="1"
                d="M0,64L60,96C120,128,240,192,360,192C480,192,600,128,720,117.3C840,107,960,149,1080,144C1200,139,1320,85,1380,58.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- End Jumbotron -->

    <!-- CRUD -->

    @can('pengguna')
        <section id="crud" class="text-light bg-purple2">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h2>Let's Build Your Future Palace</h2>
                    </div>
                </div>
                <div class="row mt-5 text-center justify-content-center">
                    <div class="col-md-3">
                        <p class="mb-4">Pesan Alat dan Bahan Disini</p>
                        <form action="/" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="nama_customer" class="form-control id="nama_customer"
                                    aria-describedby="namaPelanggan" required value="{{ Auth::user()->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="produk" class="form-label">Barang :</label>
                                <select name="nama_produk"
                                    class="form-select form-select-sm @error('nama_produk') is-invalid @enderror"
                                    aria-label="Form Pemesanan" id="produk" required>
                                    <option selected>Pilih barang yang ingin dipesan</option>
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->nama_produk }}">{{ $p->nama_produk }}</option>
                                    @endforeach
                                </select>
                                @error('nama_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="qty">Qty :</label>
                                <input type="number" class="form-control @error('jumlah_pesan') is-invalid @enderror"
                                    name="jumlah_pesan" id="qty" required>
                                @error('jumlah_pesan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-5 mb-5">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endcan

    <!-- End CRUD -->

    <!-- Footer -->

    <footer id="footer" class="bg-footer text-light text-center p-2">Created by Andre &copy; 2022</footer>

    <!-- End Footer -->
@endsection
