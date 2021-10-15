<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
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
            'deskripsi' => 'required|max:100',
            'dompet'    => 'required',
            'kategori'    => 'required',
            'nilai'    => 'required',
        ]);

        $data = Transaksi::all();
        $no = 1;
        foreach ($data as $key) {
            if ($no == $key['id']) {
                $no++;
            } else {
                break;
            }
        }
        $status = $request->status;
        $transaksi = new Transaksi();
        $transaksi->kode = 'WIN' . $no . '';
        $transaksi->tanggal = $request->date;
        $transaksi->Kategori_ID = $request->kategori;
        $transaksi->Dompet_ID = $request->dompet;
        $transaksi->Status_ID = $request->status;
        $transaksi->nilai = $request->nilai;
        $transaksi->deskripsi = $request->deskripsi;
        // var_dump($transaksi->kode);
        if ($transaksi->save()) {
            return redirect('/transaksi/' . $status)->with('toast_success', 'Data Berhasi ditambahkan!');
        } else {
            return redirect('/addtransksi')->with('toast_failed', 'Data Gagal ditambahkan');
        }
    }

    public function getData(Request $request)
    {
        // echo $request;
        if ($request->from_date != '' && $request->to_date != '') {
            $data = DB::table('transaksis')
                ->where('tanggal', '>=', $request->from_date)
                ->where('tanggal', '<=', $request->to_date)
                ->where('Kategori_ID', $request->kategori)
                ->where('Dompet_ID', $request->dompet)
                ->get();
        } else {
            $data = DB::table('transaksis')->orderBy('tanggal', 'desc')->get();
        }
        return view('laporan.filter', [
            'transaksi' => $data,
            'kategori' => Kategori::orderBy('nama', 'ASC')->get(),
            'dompet'    => Dompet::orderBy('nama', 'ASC')->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
