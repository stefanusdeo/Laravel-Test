<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'max:100',
        ]);

        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->status_ID = $request->status;
        // var_dump($request->nama);
        if ($kategori->save()) {
            return redirect('/kategori')->with('toast_success', 'Data Berhasi ditambahkan!');
        } else {
            return redirect('/addkategori')->with('toast_failed', 'Data Gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'max:100',
        ]);

        $id = $request->id;
        $data = Kategori::find($id);
        $data->status_ID = $request->status;
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        if ($data->save()) {
            return redirect('/kategori')->with('toast_success', 'Data Berhasi ditambahkan!');
        } else {
            return redirect('/addkategori')->with('toast_failed', 'Data Gagal ditambahkan');
        }
    }

    public function activeKategori(Request $request)
    {
        $data = Kategori::find($request->id);
        $data->status_ID = 1;
        $data->save();
        return redirect('/kategori')->with('toast_failed', 'Status Aktif');
    }
    public function notActiveKategori(Request $request)
    {
        $data = Kategori::find($request->id);
        $data->status_ID = 0;
        $data->save();
        return redirect('/kategori')->with('toast_failed', 'Status Aktif');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
