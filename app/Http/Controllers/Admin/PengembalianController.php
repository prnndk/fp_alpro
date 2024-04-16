<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusSewaType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use App\Models\Pengembalian;
use App\Models\Sewa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pengembalians = Pengembalian::all();
        confirmDelete('Yakin ingin menghapus data ini?', 'Anda akan menghapus data pengembalian');
        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sewas = Sewa::where('status_sewa', StatusSewaType::DISETUJUI)->get();
        return view('admin.pengembalian.create', compact('sewas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengembalianRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $dataSewa = Sewa::where('id', $data['sewa_id'])->firstOrFail();
        $data['is_telat'] = $data['tanggal_kembali'] > $dataSewa->tanggal_perkiraan_kembali;
        if ($data['is_telat']) {
            $lamaTelat = strtotime($data['tanggal_kembali']) - strtotime($dataSewa->tanggal_perkiraan_kembali);
            $lamaTelat = $lamaTelat / (60 * 60 * 24);
            $dendaTelat = ($dataSewa->kendaraan->harga * 0.1) * $lamaTelat;
            $data['denda'] += $dendaTelat;
        }
        DB::beginTransaction();
        try {
            $dataSewa->update([
                'status_sewa' => StatusSewaType::SELESAI
            ]);
            Pengembalian::create($data);
            DB::commit();
            return redirect()->route('admin.pengembalian.index')->with('success', 'Berhasil menyimpan data pengembalian');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data pengembalian');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        return \view('admin.pengembalian.view', \compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        DB::beginTransaction();
        try {
            $pengembalian->sewa->status_sewa = StatusSewaType::DISETUJUI;
            $pengembalian->sewa->save();
            $pengembalian->delete();
            DB::commit();
            return redirect()->route('admin.pengembalian.index')->with('success', 'Berhasil menghapus data pengembalian');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data pengembalian');
        }
    }
}
