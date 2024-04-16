<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\StatusPembayaranType;
use App\Enums\StatusSewaType;
use App\Enums\TipePembayaranType;
use App\Http\Requests\StorePembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Support\Facades\DB;

class BayarController extends Controller
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
    public function create()
    {
        //
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
            return redirect(route('user.dashboard'))->with('success', 'Berhasil Membuat Pembayaran');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', "Gagal Menambahkan data Pembayaran");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sewa $bayar)
    {
        $type_pembayarans = TipePembayaranType::getAll();
        $status_pembayarans = StatusPembayaranType::getAll();
        $sewas = Sewa::where('status_sewa', '!=', StatusSewaType::SELESAI)->get();

        return view('user.sewa.bayar', compact('bayar', 'type_pembayarans', 'status_pembayarans', 'sewas'));
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
