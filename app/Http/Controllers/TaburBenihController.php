<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\TaburBenih;
use Illuminate\Http\Request;

class TaburBenihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TaburBenih::latest()->paginate(50);
        
        return view('halaman.TaburBenih.index', compact('data'));
    }

    public function verifikasi(){
        $data = TaburBenih::where('status', 'pending')->latest()->paginate(50);

        return view('halaman.TaburBenih.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = TaburBenih::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->paginate(50);

        return view('halaman.TaburBenih.rekap', compact('data', 'today'));
    }

    public function bulanan(string $bulan, string $tahun){

        $data = TaburBenih::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);

        return view('halaman.TaburBenih.rekap', compact('data', 'bulan', 'tahun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.TaburBenih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();

        TaburBenih::create($data);

        return redirect()->route('taburbenih.index');
    }

    public function status(string $id){
        $data = TaburBenih::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        return redirect()->route('taburbenih.verifikasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaburBenih $taburBenih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TaburBenih::findorfail($id);

        return view('halaman.TaburBenih.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();

        $find = TaburBenih::findorfail($id);
        $find->update($data);

        return redirect()->route('taburbenih.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TaburBenih::findorfail($id);
        $data->delete();

        return redirect()->route('taburbenih.verifikasi');
    }
}
