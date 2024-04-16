<?php

namespace App\Http\Controllers\Owner;

use App\Enums\StatusSewaType;
use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $uuid)
    {
        $sewa = Sewa::where('uuid', $uuid)->firstOrFail();
        $pengembalian = Pengembalian::where('sewa_id', $sewa->id)->first();
        if ($sewa->status_sewa != StatusSewaType::DISETUJUI) {
            return redirect()->route('owner.sewa.show',$sewa->uuid)->with('errors', 'Status sewa tidak diizinkan untuk melakukan pengembalian');
        }else if($pengembalian){
            return redirect()->route('owner.sewa.show',$sewa->uuid)->with('errors', 'Sewa sudah dikembalikan');
        }
        return view('owner.pengembalian.create',compact('sewa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $uuid)
    {
        $sewa = Sewa::where('uuid', $uuid)->firstOrFail();
        $data = $request->validate([
            'sewa_id' => 'required|exists:sewas,id',
            'tanggal_kembali' => 'required|date|before_or_equal:today',
            'denda' => 'numeric',
            'kondisi' => 'required|string'
        ]);
        $data['is_telat'] = $data['tanggal_kembali'] > $sewa->tanggal_perkiraan_kembali;
        if ($data['is_telat']) {
            $lamaTelat = strtotime($data['tanggal_kembali']) - strtotime($sewa->tanggal_perkiraan_kembali);
            $lamaTelat = $lamaTelat / (60 * 60 * 24);
            $dendaTelat = ($sewa->kendaraan->harga * 0.1) * $lamaTelat;
            $data['denda'] += $dendaTelat;
        }
        $data['sewa_id'] = $sewa->id;
        DB::beginTransaction();
        try{

        $sewa->update([
            'status_sewa' => StatusSewaType::SELESAI
        ]);
        Pengembalian::create($data);
        DB::commit();
        return redirect()->route('owner.sewa.show',$sewa->uuid)->with('success', 'Berhasil menyimpan data pengembalian');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('owner.pengembalian.create',$sewa->uuid)->with('errors', 'Gagal menyimpan data pengembalian');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
