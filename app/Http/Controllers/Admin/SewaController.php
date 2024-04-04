<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSewaRequest;
use App\Http\Requests\UpdateSewaRequest;
use App\Models\Kendaraan;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sewas = Sewa::with('user','kendaraan')->get();
        confirmDelete('Yakin ingin menghapus data ini?','Anda akan menghapus data sewa');
        return view('admin.sewa.index', compact('sewas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kendaraans = Kendaraan::with('pemilik')->get();
        $users = User::where('role',RolesType::USER)->get();
        return view('admin.sewa.create',compact('kendaraans','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSewaRequest $request): RedirectResponse
    {
        $data= $request->validated();

        $sewa = Sewa::where('kendaraan_id',$data['kendaraan_id'])
            ->where(function($query) use ($data){
                $query->whereBetween('tanggal_sewa',[$data['tanggal_sewa'],$data['tanggal_perkiraan_kembali']])
                    ->orWhereBetween('tanggal_perkiraan_kembali',[$data['tanggal_sewa'],$data['tanggal_perkiraan_kembali']]);
            })->first();
        if ($sewa){
            return redirect()->back()->with('errors','Kendaraan sudah di booking pada tanggal tersebut');
        }
        $lama_sewa = strtotime($data['tanggal_perkiraan_kembali']) - strtotime($data['tanggal_sewa']);
        $lama_sewa = $lama_sewa/(60*60*24);
        $harga = Kendaraan::findOrfail($data['kendaraan_id'])->harga;
        $data['total_harga'] = $lama_sewa * $harga;
        DB::beginTransaction();
        try {
            Sewa::create($data);
            DB::commit();
            return redirect(route('admin.sewa.index'))->with('success', 'Sewa berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect(route('admin.sewa.create'))->with('errors', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sewa $sewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sewa $sewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSewaRequest $request, Sewa $sewa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sewa $sewa)
    {
        DB::beginTransaction();
        try {
            $sewa->delete();
            DB::commit();
            return redirect(route('admin.sewa.index'))->with('success', 'Sewa berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect(route('admin.sewa.index'))->with('errors', $e->getMessage());
        }
    }
}
