@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Produk</div>
                <div class="card-body">
                    <a href="/admin/produk/create" class="btn btn-primary">Tambah Produk</a>
                    <br><br>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td> Rp {{ $p->harga }}</td>
                                <td>{{ $p->stok }}</td>
                                <td>{{ $p->kategori }}</td>
                                <td>
                                    <a href="/admin/produk/{{ $p->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/admin/produk/{{ $p->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
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

