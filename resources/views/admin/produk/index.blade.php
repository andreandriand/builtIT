@extends('layouts.admin')

@section('content')

@if(session()->has('success'))
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
                <div class="card-header">Data Produk</div>
                <div class="card-body">
                    <a href="/admin/dataProduk/tambah" class="btn btn-primary">Tambah Produk</a>
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
                                    <a href="/admin/dataProduk/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                    <form action="/admin/dataProduk/delete/{{ $p->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</button>
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

