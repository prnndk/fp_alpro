<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Menghapus Data Pelanggan';
        $text = 'Anda yakin ingin menghapus data pelanggan ini?';
        confirmDelete($title, $text);
        $pelanggans = Pelanggan::all();
       return view('admin.pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::where('role',RolesType::USER->value)->whereNotIn('id',Pelanggan::pluck('user_id'))->get();
        return view('admin.pelanggan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        $validated = $request->validated();

    DB::beginTransaction();
    try {
        $pelanggan = Pelanggan::create($validated);
        DB::commit();
    return redirect(route('pelanggan.index'))->with('success', 'Pelanggan berhasil ditambahkan');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('errors', 'Pelanggan gagal ditambahkan');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan): View
    {
        return \view('admin.pelanggan.view', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan): View
    {
        $users = User::where('role',RolesType::USER->value)->get();
        return view('admin.pelanggan.edit', compact('pelanggan','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $pelanggan->save($validated);
            DB::commit();
            return redirect(route('pelanggan.index'))->with('success', 'Pelanggan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Gagal Mengubah Data Pelanggan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $pelanggan->delete();
            DB::commit();
            return redirect(route('pelanggan.index'))->with('success', 'Berhasil Menghapus data Pelanggan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Gagal Menghapus Data Pelanggan');
        }
    }
}
