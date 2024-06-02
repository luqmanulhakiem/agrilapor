<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $data = $request->validated();

        $find = User::where('username', $data['username'])->first();
        if (!empty($find)) {
            if (Hash::check($data['password'], $find->password)) {
                Auth::attempt(['username' => $data['username'], 'password' => $data['password']]);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withInput()->withErrors(['password anda salah']);
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'username anda salah']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
