@extends('layouts.kasir')

@section('content')

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
                            @foreach($pesanan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->tanggal_pesan }}</td>
                                <td>{{ $p->id_produk }}</td>
                                <td>{{ $p->jumlah_pesan }}</td>
                                <td>{{ $p->status }}</td>
                                <td>{{ $p->nama_kasir }}</td>
                                <td>
                                    <a href="/kasir/{{ $p->id }}/accept" class="btn btn-warning">Terima</a>
                                    <form action="/kasir/{{ $p->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
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