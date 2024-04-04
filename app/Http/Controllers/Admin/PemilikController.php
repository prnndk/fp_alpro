<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePemilikRequest;
use App\Http\Requests\UpdatePemilikRequest;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('admin.pemilik.index', [
            'pemiliks' => Pemilik::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::where('role',RolesType::OWNER->value)->whereNotIn('id',Pemilik::pluck('user_id'))->get();
        return view('admin.pemilik.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemilikRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $pemilik = Pemilik::create($data);
            DB::commit();
            return redirect(route('pemilik.index'))->with('success', 'Berhasil Menambahkan data Pemilik');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Pemilik gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemilik $pemilik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemilik $pemilik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemilikRequest $request, Pemilik $pemilik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemilik $pemilik)
    {
        DB::beginTransaction();
        try {
            $pemilik->delete();
            DB::commit();
            return redirect(route('pemilik.index'))->with('success', 'Berhasil Menghapus data Pemilik');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Pemilik gagal dihapus');
        }
    }
}
