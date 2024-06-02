<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(TaburBenih $taburBenih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaburBenih $taburBenih)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaburBenih $taburBenih)
    {
        //
    }
}
