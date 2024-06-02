<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/login-request', [AuthController::class, 'login'])->name('login.request');

Route::group(['middleware' => ['auth']], function (){
    // Dashboard
    Route::get('/dashboard', function () {
        return view('halaman.Dashboard.index');
    });
});