<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\Babat;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BabatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Babat::latest()->paginate(50);
        
        return view('halaman.Babat.index', compact('data'));
    }

    public function verifikasi(){
        $data = Babat::latest()->paginate(50);

        return view('halaman.Babat.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = Laporan::where('data', 'Babat')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.Babat.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = Laporan::where('data', 'Babat')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = Laporan::where('data', 'Babat')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.Babat.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = Laporan::where('data', 'Babat')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);
        
        $nama = 'Laporan Bulanan-' . $bulan . '-' . $tahun . '.pdf';

        $pdf = PDF::loadView('pdf.bulanan', ['bulan' => $bulan, 'data' => $data, 'tahun' => $tahun]);
        return $pdf->download($nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.Babat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();

        Babat::create($data);

        if (Auth::user()->role == 'user') {
            return redirect()->route('babat.index');
        } else {
            return redirect()->route('babat.verifikasi');
        }
    }

    public function status(string $id){
        $data = Babat::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        Laporan::create([
            'jenis' => $data['jenis'],
            'rencana' => $data['rencana'],
            'realisasi' => $data['realisasi'],
            'persentase' => $data['persentase'],
            'status' => 'verified',
            'data' => 'Babat',
        ]);
        return redirect()->route('babat.verifikasi');
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
        $data = Babat::findorfail($id);

        return view('halaman.Babat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();

        $find = Babat::findorfail($id);
        $find->update($data);

        if ($find->status == 'verified') {
            Laporan::create([
                'jenis' => $data['jenis'],
                'rencana' => $data['rencana'],
                'realisasi' => $data['realisasi'],
                'persentase' => $data['persentase'],
                'status' => 'verified',
                'data' => 'Babat',
            ]);
        }


        return redirect()->route('babat.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Babat::findorfail($id);
        $data->delete();

        return redirect()->route('babat.verifikasi');
    }
}