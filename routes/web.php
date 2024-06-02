<?php

use App\Http\Controllers\AuthController;
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
            Route::get('create', 'create')->name('taburbenih.create');
            Route::post('store', 'store')->name('taburbenih.store');
            Route::get('status/{id}', 'status')->name('taburbenih.status');
            Route::get('edit/{id}', 'edit')->name('taburbenih.edit');
            Route::get('update/{id}', 'update')->name('taburbenih.edit');
            Route::get('destroy/{id}', 'destroy')->name('taburbenih.edit');
        });
    });
});