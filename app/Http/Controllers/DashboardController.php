<?php

namespace App\Http\Controllers;

use App\Models\Acir;
use App\Models\Babat;
use App\Models\Bibit;
use App\Models\Dangir;
use App\Models\LubangTanam;
use App\Models\OperArea;
use App\Models\OverSpin;
use App\Models\Sulaman;
use App\Models\TaburBenih;
use App\Models\Tanam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $taburbenih = TaburBenih::where('status', 'pending')->count();
        $overspin = OverSpin::where('status', 'pending')->count();
        $operarea = OperArea::where('status', 'pending')->count();
        $bibit = Bibit::where('status', 'pending')->count();
        $acir = Acir::where('status', 'pending')->count();
        $lubangtanam = LubangTanam::where('status', 'pending')->count();
        $tanam = Tanam::where('status', 'pending')->count();
        $sulaman = Sulaman::where('status', 'pending')->count();
        $babat = Babat::where('status', 'pending')->count();
        $dangir = Dangir::where('status', 'pending')->count();

        $data = [
            'taburbenih' => $taburbenih,
            'overspin' => $overspin,
            'operarea' => $operarea,
            'bibit' => $bibit,
            'acir' => $acir,
            'lubangtanam' => $lubangtanam,
            'tanam' => $tanam,
            'sulaman' => $sulaman,
            'babat' => $babat,
            'dangir' => $dangir,
        ];
        // return response()->json($data);
        return view('halaman.Dashboard.index', compact('data'));
    }
}
