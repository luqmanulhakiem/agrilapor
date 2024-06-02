<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\Dangir;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DangirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dangir::latest()->paginate(50);
        
        return view('halaman.Dangir.index', compact('data'));
    }

    public function verifikasi(){
        $data = Dangir::where('status', 'pending')->latest()->paginate(50);

        return view('halaman.Dangir.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = Dangir::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->paginate(50);

        return view('halaman.Dangir.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = Dangir::where('status', 'verified')->whereDate('created_at', $tanggal)->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = Dangir::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);

        return view('halaman.Dangir.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = Dangir::where('status', 'verified')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->latest()->paginate(50);
        
        $nama = 'Laporan Bulanan-' . $bulan . '-' . $tahun . '.pdf';

        $pdf = PDF::loadView('pdf.bulanan', ['bulan' => $bulan, 'data' => $data, 'tahun' => $tahun]);
        return $pdf->download($nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.Dangir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();

        Dangir::create($data);

        if (Auth::user()->role == 'user') {
            return redirect()->route('dangir.index');
        } else {
            return redirect()->route('dangir.verifikasi');
        }
    }

    public function status(string $id){
        $data = Dangir::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        return redirect()->route('dangir.verifikasi');
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
        $data = Dangir::findorfail($id);

        return view('halaman.Dangir.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();

        $find = Dangir::findorfail($id);
        $find->update($data);

        return redirect()->route('dangir.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Dangir::findorfail($id);
        $data->delete();

        return redirect()->route('dangir.verifikasi');
    }
}
