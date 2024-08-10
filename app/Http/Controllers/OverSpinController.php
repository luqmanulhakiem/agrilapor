<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahDataRequest;
use App\Models\Laporan;
use App\Models\OverSpin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OverSpinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OverSpin::latest()->paginate(50);
        
        return view('halaman.OverSpin.index', compact('data'));
    }

    public function verifikasi(){
        $data = OverSpin::latest()->paginate(50);

        return view('halaman.OverSpin.index', compact('data'));
    }

    public function harian(string $tanggal){
        $today = $tanggal;

        $data = Laporan::where('data', 'OverSpin')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.OverSpin.rekap', compact('data', 'today'));
    }
    public function downloadHarian(string $tanggal){
        $today = $tanggal;
        
        $data = Laporan::where('data', 'OverSpin')->where('status', 'verified')->whereDate('updated_at', $tanggal)->orderBy('updated_at', 'desc')->latest()->get();
        $nama = 'Laporan Harian-' . $tanggal . '.pdf';

        $pdf = PDF::loadView('pdf.harian', ['today' => $today, 'data' => $data]); //i want send $data to $html
        return $pdf->download($nama);
    }

    public function bulanan(string $bulan, string $tahun){

        $data = Laporan::where('data', 'OverSpin')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);

        return view('halaman.OverSpin.rekap', compact('data', 'bulan', 'tahun'));
    }

    public function downloadBulanan(string $bulan, string $tahun){
        $data = Laporan::where('data', 'OverSpin')->where('status', 'verified')->whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->orderBy('updated_at', 'desc')->latest()->paginate(50);
        
        $nama = 'Laporan Bulanan-' . $bulan . '-' . $tahun . '.pdf';

        $pdf = PDF::loadView('pdf.bulanan', ['bulan' => $bulan, 'data' => $data, 'tahun' => $tahun]);
        return $pdf->download($nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.OverSpin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TambahDataRequest $request)
    {
        $data = $request->validated();
        $data['persentase'] =  ((int)$data['realisasi'] /  (int)$data['rencana']) *  100;


        OverSpin::create($data);

        if (Auth::user()->role == 'user') {
            return redirect()->route('overspin.index');
        } else {
            return redirect()->route('overspin.verifikasi');
        }
    }

    public function status(string $id){
        $data = OverSpin::findorfail($id);
        $data->update([
            'status' => 'verified'
        ]);
        Laporan::create([
            'jenis' => $data['jenis'],
            'rencana' => $data['rencana'],
            'realisasi' => $data['realisasi'],
            'persentase' => $data['persentase'],
            'status' => 'verified',
            'data' => 'OverSpin',
        ]);
        return redirect()->route('overspin.verifikasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(OverSpin $overspin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = OverSpin::findorfail($id);

        return view('halaman.OverSpin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TambahDataRequest $request, string $id)
    {
        $data = $request->validated();
        $data['persentase'] =  ((int)$data['realisasi'] /  (int)$data['rencana']) *  100;


        $find = OverSpin::findorfail($id);
        $find->update($data);
        if ($find->status == 'verified') {
            Laporan::create([
                'jenis' => $data['jenis'],
                'rencana' => $data['rencana'],
                'realisasi' => $data['realisasi'],
                'persentase' => ((int)$data['realisasi'] /  (int)$data['rencana']) *  100,
                'status' => 'verified',
                'data' => 'OverSpin',
            ]);
        }

        return redirect()->route('overspin.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OverSpin::findorfail($id);
        $data->delete();

        return redirect()->route('overspin.verifikasi');
    }
}