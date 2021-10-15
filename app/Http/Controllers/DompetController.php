<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use Illuminate\Http\Request;

class DompetController extends Controller
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
    public function edit(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:5',
            'deskripsi' => 'max:100',
        ]);

        $id = $request->id;
        $data = Dompet::find($id);
        $data->status = $request->status;
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->referensi = $request->referensi;
        if ($data->save()) {
            return redirect('/')->with('toast_success', 'Data Berhasi ditambahkan!');
        } else {
            return redirect('/addDompet')->with('toast_failed', 'Data Gagal ditambahkan');
        }
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

        $dompet = new Dompet();
        $dompet->nama = $request->nama;
        $dompet->referensi = $request->referensi;
        $dompet->deskripsi = $request->deskripsi;
        $dompet->status = $request->status;
        if ($dompet->save()) {
            return redirect('/')->with('toast_success', 'Data Berhasi ditambahkan!');
        } else {
            return redirect('/addDompet')->with('toast_failed', 'Data Gagal ditambahkan');
        }
    }

    public function activeDompet(Request $request)
    {
        $data = Dompet::find($request->id);
        $data->status = 1;
        $data->save();
        return redirect('/')->with('toast_failed', 'Status Aktif');
    }
    public function notActiveDompet(Request $request)
    {
        $data = Dompet::find($request->id);
        $data->status = 0;
        $data->save();
        return redirect('/')->with('toast_failed', 'Status Aktif');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
