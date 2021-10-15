<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
    ];

    public static function find($id)
    {
        $kategori = self::all();
        $detailkategori = [];
        foreach ($kategori as $d) {
            if ($id == $d['id']) {
                $detailkategori = $d;
            }
        }
        return $detailkategori;
    }

    public static function findByStatus($status)
    {
        $detailkategori = DB::table('kategoris')
            ->where('status_ID', '=', $status)
            ->get();
        return $detailkategori;
    }

    public function status()
    {
        return $this->hasMany(Dompet_Status::class);
    }
}
