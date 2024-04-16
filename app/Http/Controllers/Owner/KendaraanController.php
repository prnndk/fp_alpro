<?php

namespace App\Http\Controllers\Owner;

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
        $kendaraans = Kendaraan::where('pemilik_id',auth()->user()->pemilik->id)->get();
        $commonKendaraan = Kendaraan::select('tipe_kendaraan_id')->where('pemilik_id',auth()->user()->pemilik->id)->groupBy('tipe_kendaraan_id')->selectRaw('COUNT(*) AS count')->orderBy('count', 'DESC')->first()->tipe_kendaraan->name;
        confirmDelete('Menghapus data kendaraan','Apakah anda yakin menghapus data kendaraan ini?');
        return view('owner.kendaraan.index',compact('kendaraans','commonKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipe_kendaraans = TipeKendaraan::all();
        $pemiliks = Pemilik::all();
        return view('owner.kendaraan.create',compact('tipe_kendaraans','pemiliks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKendaraanRequest $request)
    {
        $validated = $request->validated();

        if ($validated['pemilik_id'] != auth()->user()->pemilik->id){
            $validated['pemilik_id'] = auth()->user()->pemilik->id;
        }

        if($request->hasFile('image')){
            $validated['image']=$request->file('image')->store('/images/kendaraan');
        }

        DB::beginTransaction();
        try{
            Kendaraan::create($validated);
            DB::commit();
            return redirect(route('owner.kendaraan.index'))->with('success','Kendaraan berhasil ditambahkan');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('errors',"Gagal Menambah Kendaraan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan): View
    {
        return view('owner.kendaraan.view',compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan): View|RedirectResponse
    {
        if($kendaraan->pemilik_id != auth()->user()->pemilik->id){
            return redirect()->back()->with('errors','Anda tidak memiliki akses ke kendaraan ini');
        }
        $tipe_kendaraans = TipeKendaraan::all();
        return view('owner.kendaraan.edit',compact('kendaraan','tipe_kendaraans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->file('image')){
            $validated['image']=$request->file('image')->store('/images/kendaraan');
        }
        DB::beginTransaction();
        try{
            $kendaraan->update($validated);
            DB::commit();
            return redirect(route('owner.kendaraan.index'))->with('success','Kendaraan berhasil diubah');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('errors',"Gagal Mengubah Kendaraan");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan): RedirectResponse
    {
        DB::beginTransaction();
        try{
            $kendaraan->delete();
            DB::commit();
            return redirect(route('owner.kendaraan.index'))->with('success','Kendaraan berhasil dihapus');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('errors',"Gagal Menghapus Kendaraan");
        }
    }
}
