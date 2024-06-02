<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OverSpinController;
use App\Http\Controllers\TaburBenihController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::user() != null) {
        return redirect()->route('dashboard');
    }else{
        return view('auth.login');
    }
})->name('login');
Route::post('/login-request', [AuthController::class, 'login'])->name('login.request');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/logout-request', [AuthController::class, 'logout'])->name('logout.request');
    // Dashboard
    Route::get('/dashboard', function () {
        return view('halaman.Dashboard.index');
    })->name('dashboard');

    // Tabur Benih
    Route::controller(TaburBenihController::class)->group(function (){
        Route::prefix('tabur-benih')->group(function () {
            Route::get('index', 'index')->name('taburbenih.index');
            Route::get('verifikasi', 'verifikasi')->name('taburbenih.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('taburbenih.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('taburbenih.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('taburbenih.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('taburbenih.bulanan.download');
            Route::get('create', 'create')->name('taburbenih.create');
            Route::post('store', 'store')->name('taburbenih.store');
            Route::get('status/{id}', 'status')->name('taburbenih.status');
            Route::get('edit/{id}', 'edit')->name('taburbenih.edit');
            Route::post('update/{id}', 'update')->name('taburbenih.update');
            Route::get('destroy/{id}', 'destroy')->name('taburbenih.destroy');
        });
    });
    // OverSpin
    Route::controller(OverSpinController::class)->group(function (){
        Route::prefix('over-spin')->group(function () {
            Route::get('index', 'index')->name('overspin.index');
            Route::get('verifikasi', 'verifikasi')->name('overspin.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('overspin.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('overspin.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('overspin.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('overspin.bulanan.download');
            Route::get('create', 'create')->name('overspin.create');
            Route::post('store', 'store')->name('overspin.store');
            Route::get('status/{id}', 'status')->name('overspin.status');
            Route::get('edit/{id}', 'edit')->name('overspin.edit');
            Route::post('update/{id}', 'update')->name('overspin.update');
            Route::get('destroy/{id}', 'destroy')->name('overspin.destroy');
        });
    });
});