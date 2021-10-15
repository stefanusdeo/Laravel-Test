<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'kode',
        'deskripsi',
        'Kategori_ID',
        'Status_ID',
        'nilai',
        'dompet',
        'tanggal'
    ];

    public static function find($id)
    {
        $transaksi = self::all();
        $detailtransaksi = [];
        foreach ($transaksi as $d) {
            if ($id == $d['Kategori_ID']) {
                $detailtransaksi = $d;
            }
        }
        return $detailtransaksi;
    }
    public static function findByCategory($status)
    {
        $detailDompet = DB::table('transaksis')
            ->where('Status_ID', '=', $status)
            ->get();
        return $detailDompet;
    }
}
