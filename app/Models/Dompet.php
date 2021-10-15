<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dompet extends Model
{
    use HasFactory;
    protected $table = 'dompets';
    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
        'referensi'
    ];

    public static function find($id)
    {
        $dompet = self::all();
        $detailDompet = [];
        foreach ($dompet as $d) {
            if ($id == $d['id']) {
                $detailDompet = $d;
            }
        }
        return $detailDompet;
    }

    public static function findByStatus($status)
    {
        $detailDompet = DB::table('dompets')
            ->where('status', '=', $status)
            ->get();
        return $detailDompet;
    }

    public function status()
    {
        return $this->hasMany(Dompet_Status::class);
    }
}
