<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet_Status extends Model
{
    use HasFactory;
    protected $table = 'dompet_statuses';
    protected $fillable = [
        'nama',
    ];

    public function dompet()
    {
        return $this->hasMany(Dompet::class);
    }
}
