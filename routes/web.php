<?php


use App\Models\Dompet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DompetController;

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
        'dompet' => Dompet::orderBy('id', 'DESC')->get()
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
