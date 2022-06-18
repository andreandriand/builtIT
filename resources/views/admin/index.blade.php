@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2> Selamat Datang, Admin</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>
                        <p class="card-text">Klik tombol dibawah untuk melihat daftar produk</p>
                        <a href="/admin/dataProduk" class="btn btn-primary">Data Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pesanan</h5>
                        <p class="card-text">Klik tombol dibawah untuk melihat data pesanan</p>
                        <a href="/admin/dataPesanan" class="btn btn-primary">Data Pesanan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengguna</h5>
                        <p class="card-text">Klik tombol dibawah untuk melihat daftar pengguna</p>
                        <a href="/admin/dataUser" class="btn btn-primary">Data Pengguna</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form class="mt-3" action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit" name="logout">Keluar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
