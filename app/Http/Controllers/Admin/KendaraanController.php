<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kendaraan;
use App\Models\Pemilik;
use App\Models\TipeKendaraan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kendaraans = Kendaraan::all();
        confirmDelete('Menghapus data kendaraan', 'Apakah anda yakin menghapus data kendaraan ini?');
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipe_kendaraans = TipeKendaraan::all();
        $pemiliks = Pemilik::all();
        return view('admin.kendaraan.create', compact('tipe_kendaraans', 'pemiliks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKendaraanRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/kendaraan'), $filename);
            $validated['image'] = $filename;
        }

        DB::beginTransaction();
        try {
            Kendaraan::create($validated);
            DB::commit();
            return redirect(route('admin.kendaraan.index'))->with('success', 'Kendaraan berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menambah Kendaraan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan): View
    {
        return view('admin.kendaraan.view', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan): View
    {
        $tipe_kendaraans = TipeKendaraan::all();
        $pemiliks = Pemilik::all();
        return view('admin.kendaraan.edit', compact('kendaraan', 'tipe_kendaraans', 'pemiliks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/kendaraan'), $filename);
            $validated['image'] = $filename;
        }

        DB::beginTransaction();
        try {
            $kendaraan->update($validated);
            DB::commit();
            return redirect(route('admin.kendaraan.index'))->with('success', 'Kendaraan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Mengubah Kendaraan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $kendaraan->delete();
            DB::commit();
            return redirect(route('admin.kendaraan.index'))->with('success', 'Kendaraan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menghapus Kendaraan");
        }
    }
}
