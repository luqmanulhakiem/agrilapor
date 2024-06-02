<?php

use App\Http\Controllers\AcirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\LubangTanamController;
use App\Http\Controllers\OperAreaController;
use App\Http\Controllers\OverSpinController;
use App\Http\Controllers\SulamanController;
use App\Http\Controllers\TaburBenihController;
use App\Http\Controllers\TanamController;
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
    // OperArea
    Route::controller(OperAreaController::class)->group(function (){
        Route::prefix('oper-area')->group(function () {
            Route::get('index', 'index')->name('operarea.index');
            Route::get('verifikasi', 'verifikasi')->name('operarea.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('operarea.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('operarea.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('operarea.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('operarea.bulanan.download');
            Route::get('create', 'create')->name('operarea.create');
            Route::post('store', 'store')->name('operarea.store');
            Route::get('status/{id}', 'status')->name('operarea.status');
            Route::get('edit/{id}', 'edit')->name('operarea.edit');
            Route::post('update/{id}', 'update')->name('operarea.update');
            Route::get('destroy/{id}', 'destroy')->name('operarea.destroy');
        });
    });
    // Bibit
    Route::controller(BibitController::class)->group(function (){
        Route::prefix('bibit')->group(function () {
            Route::get('index', 'index')->name('bibit.index');
            Route::get('verifikasi', 'verifikasi')->name('bibit.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('bibit.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('bibit.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('bibit.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('bibit.bulanan.download');
            Route::get('create', 'create')->name('bibit.create');
            Route::post('store', 'store')->name('bibit.store');
            Route::get('status/{id}', 'status')->name('bibit.status');
            Route::get('edit/{id}', 'edit')->name('bibit.edit');
            Route::post('update/{id}', 'update')->name('bibit.update');
            Route::get('destroy/{id}', 'destroy')->name('bibit.destroy');
        });
    });
    // Acir
    Route::controller(AcirController::class)->group(function (){
        Route::prefix('acir')->group(function () {
            Route::get('index', 'index')->name('acir.index');
            Route::get('verifikasi', 'verifikasi')->name('acir.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('acir.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('acir.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('acir.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('acir.bulanan.download');
            Route::get('create', 'create')->name('acir.create');
            Route::post('store', 'store')->name('acir.store');
            Route::get('status/{id}', 'status')->name('acir.status');
            Route::get('edit/{id}', 'edit')->name('acir.edit');
            Route::post('update/{id}', 'update')->name('acir.update');
            Route::get('destroy/{id}', 'destroy')->name('acir.destroy');
        });
    });
    // Lubang Tanam
    Route::controller(LubangTanamController::class)->group(function (){
        Route::prefix('lubang-tanam')->group(function () {
            Route::get('index', 'index')->name('lubangtanam.index');
            Route::get('verifikasi', 'verifikasi')->name('lubangtanam.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('lubangtanam.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('lubangtanam.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('lubangtanam.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('lubangtanam.bulanan.download');
            Route::get('create', 'create')->name('lubangtanam.create');
            Route::post('store', 'store')->name('lubangtanam.store');
            Route::get('status/{id}', 'status')->name('lubangtanam.status');
            Route::get('edit/{id}', 'edit')->name('lubangtanam.edit');
            Route::post('update/{id}', 'update')->name('lubangtanam.update');
            Route::get('destroy/{id}', 'destroy')->name('lubangtanam.destroy');
        });
    });
    // Tanam
    Route::controller(TanamController::class)->group(function (){
        Route::prefix('tanam')->group(function () {
            Route::get('index', 'index')->name('tanam.index');
            Route::get('verifikasi', 'verifikasi')->name('tanam.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('tanam.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('tanam.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('tanam.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('tanam.bulanan.download');
            Route::get('create', 'create')->name('tanam.create');
            Route::post('store', 'store')->name('tanam.store');
            Route::get('status/{id}', 'status')->name('tanam.status');
            Route::get('edit/{id}', 'edit')->name('tanam.edit');
            Route::post('update/{id}', 'update')->name('tanam.update');
            Route::get('destroy/{id}', 'destroy')->name('tanam.destroy');
        });
    });
    // Sulaman
    Route::controller(SulamanController::class)->group(function (){
        Route::prefix('sulaman')->group(function () {
            Route::get('index', 'index')->name('sulaman.index');
            Route::get('verifikasi', 'verifikasi')->name('sulaman.verifikasi');
            Route::get('rekap-harian/{tanggal}', 'harian')->name('sulaman.harian');
            Route::get('download-harian/{tanggal}', 'downloadHarian')->name('sulaman.harian.download');
            Route::get('rekap-bulanan/{bulan}/{tahun}', 'bulanan')->name('sulaman.bulanan');
            Route::get('download-bulanan/{bulan}/{tahun}', 'downloadBulanan')->name('sulaman.bulanan.download');
            Route::get('create', 'create')->name('sulaman.create');
            Route::post('store', 'store')->name('sulaman.store');
            Route::get('status/{id}', 'status')->name('sulaman.status');
            Route::get('edit/{id}', 'edit')->name('sulaman.edit');
            Route::post('update/{id}', 'update')->name('sulaman.update');
            Route::get('destroy/{id}', 'destroy')->name('sulaman.destroy');
        });
    });
});