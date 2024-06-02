<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\LubangTanam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LubangTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LubangTanam::latest()->paginate(50);
        
        return view('halaman.LubangTanam.index', compact('data'));
    }

    public function verifikasi(){
        $data = LubangTanam::where('status', 'pending')->latest()->paginate(50);

        return view('halaman.LubangTanam.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = LubangTanam::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->paginate(50);

        return view('halaman.LubangTanam.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = LubangTanam::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = LubangTanam::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);

        return view('halaman.LubangTanam.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = LubangTanam::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);
        
        $nama = 'Laporan Bulanan-' . $bulan . '-' . $tahun . '.pdf';

        $pdf = PDF::loadView('pdf.bulanan', ['bulan' => $bulan, 'data' => $data, 'tahun' => $tahun]);
        return $pdf->download($nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.LubangTanam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();

        LubangTanam::create($data);

        if (Auth::user()->role == 'user') {
            return redirect()->route('lubangtanam.index');
        } else {
            return redirect()->route('lubangtanam.verifikasi');
        }
    }

    public function status(string $id){
        $data = LubangTanam::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        return redirect()->route('lubangtanam.verifikasi');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = LubangTanam::findorfail($id);

        return view('halaman.LubangTanam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();

        $find = LubangTanam::findorfail($id);
        $find->update($data);

        return redirect()->route('lubangtanam.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LubangTanam::findorfail($id);
        $data->delete();

        return redirect()->route('lubangtanam.verifikasi');
    }
}

