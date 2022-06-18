@extends('layouts.kasir')

@section('content')
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pesanan</div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>ID Barang</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Status</th>
                                    <th>Nama Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_customer }}</td>
                                        <td>{{ $p->tanggal_pesan }}</td>
                                        <td>{{ $p->id_produk }}</td>
                                        <td>{{ $p->jumlah_pesan }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->nama_kasir }}</td>
                                        <td>
                                            <a href="/kasir/accept/{{ $p->id }}" class="btn btn-warning">Terima</a>
                                            <form action="/kasir/delete/{{ $p->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure ?')"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
