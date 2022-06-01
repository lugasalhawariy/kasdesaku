<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Models\Pemasukan;
use GuzzleHttp\Middleware;

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
require __DIR__.'/auth.php';

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/rekap/{tahun}', [RekapController::class, 'index'])->name('rekap')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'pemasukan'], function()
    {
        Route::get('/', [PemasukanController::class, 'index'])->name('pemasukan.index');
        Route::get('/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
        Route::post('/store', [PemasukanController::class, 'store'])->name('pemasukan.store');
        Route::delete('/destroy/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');
        Route::get('/edit/{id}', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
        Route::put('/update/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update');

        Route::get('/export-excel', [PemasukanController::class, 'export'])->name('pemasukan.export');
    });

    Route::group(['prefix' => 'pengeluaran'], function()
    {
        Route::get('/', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
        Route::get('/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
        Route::post('/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
        Route::delete('/destroy/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
        Route::get('/edit/{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
        Route::put('/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');

        Route::get('/export-excel', [PengeluaranController::class, 'export'])->name('pengeluaran.export');
    });
});

// Route::group(['prefix' => 'authentication'], function(){
//     Route::get('/login', function(){
//         return view('pages.auth.login');
//     })->name('auth.login')->middleware('guest');

//     Route::get('/register', function(){
//         return view('pages.auth.register');
//     })->name('auth.register')->middleware('guest');
// });

