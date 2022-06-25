<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Toko;
use App\Models\Pesanan;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('admin.pesanan.index', ['title' => 'Data Pesanan', 'pesanan' => $pesanan]);
    }

    public function index2()
    {
        $pesanan = Pesanan::all();
        return view('kasir.index', ['title' => 'Halaman Kasir', 'pesanan' => $pesanan]);
    }

    public function history($nama)
    {
        $pesanan = Pesanan::where('nama_customer', 'like', "%$nama%")->get();
        return view('history', ['title' => 'Riwayat Pesanan', 'pesanan' => $pesanan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesananRequest $request)
    {
        $pesanan = $request->validate([
            'nama_customer' => 'required|string|min:3|max:255',
            'nama_produk' => 'required|string|min:3|max:20',
            'jumlah_pesan' => 'required|integer',
        ]);

        Pesanan::create($pesanan);
        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        $produk = Toko::all();
        return view('admin.pesanan.edit', ['title' => 'Edit Pesanan', 'produk' => $produk, 'pesanan' => $pesanan, 'user' => User::select('nama')->where('role', 'Kasir')->get()]);
    }
    public function edit2(Pesanan $pesanan)
    {
        $produk = Toko::all();
        return view('kasir.edit', ['title' => 'Edit Pesanan', 'produk' => $produk, 'pesanan' => $pesanan, 'user' => User::select('nama')->where('role', 'Kasir')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananRequest  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        $rules = [
            'nama_customer' => 'required|string|min:3|max:255',
            'nama_produk' => 'required|string',
            'jumlah_pesan' => 'required|integer',
            'status' => 'required|string|min:3|max:255',
        ];

        $rules['nama_kasir'] = $request->status === 'Sudah Diproses' ? 'required|string|min:3|max:255' : 'nullable';

        $pesanan->update($request->validate($rules));
        return redirect()->route('admin.pesanan.index')->with('success', 'Data pesanan berhasil diubah');
    }

    public function update2(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        $rules = [
            'nama_customer' => 'required|string|min:3|max:255',
            'nama_produk' => 'required|string',
            'jumlah_pesan' => 'required|integer',
            'status' => 'required|string|min:3|max:255',
        ];

        $rules['nama_kasir'] = $request->status === 'Sudah Diproses' ? 'required|string|min:3|max:255' : 'nullable';

        $pesanan->update($request->validate($rules));
        return redirect()->route('kasir.index')->with('success', 'Pesanan berhasil diterima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->destroy($pesanan->id);
        return redirect()->route('admin.pesanan.index')->with('success', 'Data pesanan berhasil dihapus');
    }

    public function destroy2(Pesanan $pesanan)
    {
        $pesanan->destroy($pesanan->id);
        return redirect()->route('kasir.index')->with('success', 'Data pesanan berhasil dihapus');
    }
}
