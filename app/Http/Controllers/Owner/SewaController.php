<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pembayaran;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sewas = Sewa::whereIn('kendaraan_id',Kendaraan::where('pemilik_id',auth()->user()->pemilik->id)->select('id')->get())->with('user','kendaraan')->get();
        return view('owner.sewa.index', compact('sewas'));
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
    public function show(string $id)
    {
        $sewa = Sewa::where('uuid', $id)->firstOrFail();
        $pembayarans = Pembayaran::where('sewa_id', $sewa->id)->get();
        $pengembalian = Pengembalian::where('sewa_id', $sewa->id)->first();
        return view('owner.sewa.view',compact('sewa','pembayarans','pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
