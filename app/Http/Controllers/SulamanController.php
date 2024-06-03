<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\Laporan;
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
        $data = Sulaman::latest()->paginate(50);

        return view('halaman.Sulaman.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = Laporan::where('data', 'Sulaman')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.Sulaman.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = Laporan::where('data', 'Sulaman')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = Laporan::where('data', 'Sulaman')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.Sulaman.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = Laporan::where('data', 'Sulaman')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);
        
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
        Laporan::create([
            'jenis' => $data['jenis'],
            'rencana' => $data['rencana'],
            'realisasi' => $data['realisasi'],
            'persentase' => $data['persentase'],
            'status' => 'verified',
            'data' => 'Sulaman',
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

        if ($find->status == 'verified') {
            Laporan::create([
                'jenis' => $data['jenis'],
                'rencana' => $data['rencana'],
                'realisasi' => $data['realisasi'],
                'persentase' => $data['persentase'],
                'status' => 'verified',
                'data' => 'Sulaman',
            ]);
        }


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