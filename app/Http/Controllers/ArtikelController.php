<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan data artikel
        $data = Artikel::all();
        return view('artikel.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilan tambah data artikel
        $kategori = Kategori::all();
        return view('artikel.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambah data artikel
        $data = $request->all();

        $data['foto'] = Storage::put('img', $request->file('foto'));

        Artikel::create($data);

        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //tampilan edit data artikel
        $kategori = Kategori::all();
        return view('artikel.edit', compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //mengedit data artikel

        $data = $request->all();
        try {
            $data['foto'] = Storage::put('img', $request->foto);
            $artikel->update($data);
        } catch (\Throwable $th) {
            $data['foto'] = $artikel->foto;
            $artikel->update($data);
        }

        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //menghapus data artikel
        $artikel->delete();
        return redirect('artikel');
    }

    public function tampil()
    {
        //tampilan halaman beranda
        $data = Artikel::all();
        return view('beranda', compact('data'));
    }
}
