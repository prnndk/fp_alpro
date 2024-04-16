<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusPembayaranType;
use App\Enums\StatusSewaType;
use App\Enums\TipePembayaranType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pembayarans = Pembayaran::with('sewa')->get();
        confirmDelete('Menghapus data pembayaran', 'Apakah anda yakin menghapus data pembayaran ini?');
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_pembayarans = TipePembayaranType::getAll();
        $status_pembayarans = StatusPembayaranType::getAll();
        $sewas = Sewa::where('status_sewa', '!=', StatusSewaType::SELESAI)->get();
        return view('admin.pembayaran.create', compact('type_pembayarans', 'status_pembayarans', 'sewas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $validated['bukti_pembayaran'] = $filename;
        }

        DB::beginTransaction();
        try {
            Pembayaran::create($validated);
            DB::commit();
            return redirect(route('admin.pembayaran.index'))->with('success', 'Berhasil Membuat Pembayaran');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menambahkan data Pembayaran");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran): View
    {
        return view('admin.pembayaran.view', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran): View
    {
        $type_pembayarans = TipePembayaranType::getAll();
        $status_pembayarans = StatusPembayaranType::getAll();
        $sewas = Sewa::where('status_sewa', '!=', StatusSewaType::SELESAI)->get();
        return view('admin.pembayaran.edit', compact('pembayaran', 'type_pembayarans', 'status_pembayarans', 'sewas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $validated = $request->validated();

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $validated['bukti_pembayaran'] = $filename;
        }

        DB::beginTransaction();
        try {
            $pembayaran->update($validated);
            DB::commit();
            return redirect(route('admin.pembayaran.index'))->with('success', 'Berhasil Mengubah Pembayaran');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Mengubah data Pembayaran");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        DB::beginTransaction();
        try {
            $pembayaran->delete();
            DB::commit();
            return redirect(route('admin.pembayaran.index'))->with('success', 'Berhasil Menghapus Pembayaran');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menghapus data Pembayaran");
        }
    }
}
