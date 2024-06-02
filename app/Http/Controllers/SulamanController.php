<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\Sulaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class SulamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sulaman::latest()->paginate(50);
        
        return view('halaman.Sulaman.index', compact('data'));
    }

    public function verifikasi(){
        $data = Sulaman::where('status', 'pending')->latest()->paginate(50);

        return view('halaman.Sulaman.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = Sulaman::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->paginate(50);

        return view('halaman.Sulaman.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = Sulaman::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = Sulaman::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);

        return view('halaman.Sulaman.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = Sulaman::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);
        
        $nama = 'Laporan Bulanan-' . $bulan . '-' . $tahun . '.pdf';

        $pdf = PDF::loadView('pdf.bulanan', ['bulan' => $bulan, 'data' => $data, 'tahun' => $tahun]);
        return $pdf->download($nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.Sulaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();

        Sulaman::create($data);

        if (Auth::user()->role == 'user') {
            return redirect()->route('sulaman.index');
        } else {
            return redirect()->route('sulaman.verifikasi');
        }
    }

    public function status(string $id){
        $data = Sulaman::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        return redirect()->route('sulaman.verifikasi');
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
        $data = Sulaman::findorfail($id);

        return view('halaman.Sulaman.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();

        $find = Sulaman::findorfail($id);
        $find->update($data);

        return redirect()->route('sulaman.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sulaman::findorfail($id);
        $data->delete();

        return redirect()->route('sulaman.verifikasi');
    }
}