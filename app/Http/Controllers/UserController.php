<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePassUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(50);

        return view('halaman.User.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        // membuat data
        $simpan = User::create([
            'username' => $data['username'],
            'email' => $data['username'] . rand() . '@gmail.com',
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findorfail($id);
        return view('halaman.User.edit', compact('data'));
    }
    public function editPass(string $id)
    {
        $data = User::findorfail($id);
        return view('halaman.User.password', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();
        $find = User::findorfail($id);

        $find->update([
            'username' => $data['username'],
            'role' => $data['role'],
        ]);

        return redirect()->route('user.index');
    }

    public function updatePass(UpdatePassUserRequest $request, string $id)
    {
        $data = $request->validated();
        $find = User::findorfail($id);

        $find->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findorfail($id);
        $data->delete();

        return redirect()->route('user.index');
    }
}
