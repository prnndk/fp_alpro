<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipeKendaraanRequest;
use App\Http\Requests\UpdateTipeKendaraanRequest;
use App\Models\TipeKendaraan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TipeKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tipe_kendaraans = TipeKendaraan::all();
        confirmDelete('Menghapus data tipe kendaraan', 'Apakah anda yakin menghapus data tipe kendaraan ini?');
        return view('admin.tipe_kendaraan.index', compact('tipe_kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.tipe_kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipeKendaraanRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            TipeKendaraan::create($validated);
            DB::commit();
            return redirect(route('tipe_kendaraan.index'))->with('success', 'Tipe Kendaraan berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menambah Tipe Kendaraan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeKendaraan $tipeKendaraan): View
    {
        return view('admin.tipe_kendaraan.view', compact('tipeKendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeKendaraan $tipeKendaraan): View
    {
        return view('admin.tipe_kendaraan.edit', compact('tipeKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipeKendaraanRequest $request, TipeKendaraan $tipeKendaraan): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $tipeKendaraan->update($validated);
            DB::commit();
            return redirect(route('tipe_kendaraan.index'))->with('success', 'Tipe Kendaraan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Mengubah Tipe Kendaraan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeKendaraan $tipeKendaraan)
    {
        //
    }
}
