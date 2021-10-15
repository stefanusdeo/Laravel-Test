<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    public static function findByRange($date_from, $date_to)
    {
        $data = DB::table('transaksis')
            ->whereBetween('tanggal', array($date_from, $date_to))
            ->get();
        return $data;
    }
}
