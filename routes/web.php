<?php


use App\Models\Dompet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DompetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Dompet',
        'dompet' => Dompet::orderBy('nama', 'ASC')->get(),
    ]);
});
Route::get('/dompet/{status}', function ($status) {
    return view('byStatus', [
        'status' => $status,
        'dompet' => Dompet::findByStatus($status)
    ]);
});
Route::get('/addDompet', function () {
    return view('add');
});
Route::post('/createDompet', [DompetController::class, 'store']);
Route::get('/detailDompet/{id}', function ($id) {
    return view('detail', [
        'dompet' => Dompet::find($id)
    ]);
});
Route::get('/ActiveDompet/{id}', [DompetController::class, 'activeDompet']);
Route::get('/notActiveDompet/{id}', [DompetController::class, 'notActiveDompet']);
Route::get('/editDompet/{id}', function ($id) {
    return view('edit', [
        'dompet' => Dompet::find($id),
    ]);
});
Route::post('/editDompet', [DompetController::class, 'edit']);

// kategori
Route::get('/kategori', function () {
    return view('kategori.kategori', [
        'title' => 'Kategori',
        'kategori' => Kategori::orderBy('nama', 'ASC')->get(),
    ]);
});
Route::get('/addkategori', function () {
    return view('kategori.add');
});
Route::post('/addkategori', [KategoriController::class, 'store']);
Route::get('/editkategori/{id}', function ($id) {
    return view('kategori.ubah', [
        'kategori' => Kategori::find($id),
    ]);
});
Route::get('/detailkategori/{id}', function ($id) {
    return view('kategori.detail', [
        'kategori' => Kategori::find($id)
    ]);
});
Route::get('/kategori/{status}', function ($status) {
    return view('kategori.byStatus', [
        'status_ID' => $status,
        'kategori' => Kategori::findByStatus($status)
    ]);
});
Route::post('/editkategori', [KategoriController::class, 'edit']);
Route::get('/Activekategori/{id}', [KategoriController::class, 'activeKategori']);
Route::get('/notActivekategori/{id}', [KategoriController::class, 'notActiveKategori']);

// transaksi
Route::get('/transaksi/{status}', function ($status) {

    return view('transaksi.transaksi', [
        'status'  => $status,
        'transaksi' => Transaksi::findByCategory($status),
    ]);
});
Route::get('/addtransaksi/{status}', function ($status) {
    return view('transaksi.add', [
        'status' => $status,
        'kategori' => Kategori::orderBy('nama', 'ASC')->where('status_ID', '=', '1')->get(),
        'dompet'    => Dompet::orderBy('nama', 'ASC')->where('status', '=', '1')->get()
    ]);
});
Route::post('/addtransaksi', [TransaksiController::class, 'store']);

// laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('laporan/', [TransaksiController::class, 'getData']);
