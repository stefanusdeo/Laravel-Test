<?php

namespace Database\Seeders;

use App\Models\Dompet;
use App\Models\Dompet_Status;
use App\Models\Kategori;
use App\Models\Status_Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Dompet_Status::create([
            'nama' => 'Aktif'
        ]);
        Dompet_Status::create([
            'nama' => 'Tidak Aktif'
        ]);
        Status_Transaksi::create([
            'nama' => 'Masuk'
        ]);
        Status_Transaksi::create([
            'nama' => 'Keluar'
        ]);

        Dompet::create([
            'nama' => 'Deo',
            'referensi' => 23132,
            'deskripsi' => 'Bank BCA',
            'status'    => 1,
        ]);
        Kategori::create([
            'nama' => 'Pengeluaran',
            'status_ID' => 1,
            'deskripsi' => 'Penambahan Pengeluaran'
        ]);
    }
}
