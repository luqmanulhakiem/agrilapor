<?php

use App\Http\Controllers\AuthController;
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
});