<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Http\Requests\StoreTokoRequest;
use App\Http\Requests\UpdateTokoRequest;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Toko::all();
        return view('admin.produk.index', ['produk' => $produk, 'title' => 'Data Produk']);
    }

    public function index2()
    {
        $produk = Toko::all();
        return view('home', ['produk' => $produk, 'title' => 'Landing Page']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.insert', ['title' => 'Tambah Produk']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTokoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTokoRequest $request)
    {
        $produk = $request->validate(
            [
                'nama_produk' => 'required|max:255',
                'kategori' => 'required',
                'stok' => 'required|string|max:255',
                'harga' => 'required',
            ]
        );

        Toko::create($produk);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        return view('admin.produk.edit', ['produk' => $toko, 'title' => 'Edit Produk']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTokoRequest  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTokoRequest $request, Toko $toko)
    {
        $produk = $request->validate(
            [
                'nama_produk' => 'required|max:255',
                'kategori' => 'required',
                'stok' => 'required',
                'harga' => 'required',
            ]
        );

        $toko->update($produk);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        Toko::destroy($toko->id);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
