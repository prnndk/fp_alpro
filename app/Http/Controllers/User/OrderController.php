<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

// Import the Controller class here

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $userId = Auth::id();
        $sewas = Sewa::with('user', 'kendaraan')->where('Users_id', $userId)->get();
        return view('user.order.index', compact('sewas'));
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_sewa' => 'required|date',
            'tanggal_perkiraan_kembali' => 'required|date',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'total_harga' => 'required|numeric',
        ]);

        // Calculate total price
        $tanggalSewa = new \DateTime($validatedData['tanggal_sewa']);
        $tanggalKembali = new \DateTime($validatedData['tanggal_perkiraan_kembali']);
        $diffDays = $tanggalKembali->diff($tanggalSewa)->days;
        $totalHarga = $diffDays * $validatedData['total_harga'];

        // Create a new Sewa instance
        $sewa = new Sewa();

        // Assign the authenticated user's ID to the user_id field
        $sewa->users_id = auth()->user()->id;

        // Assign other validated data
        $sewa->tanggal_sewa = $validatedData['tanggal_sewa'];
        $sewa->tanggal_perkiraan_kembali = $validatedData['tanggal_perkiraan_kembali'];
        $sewa->kendaraan_id = $validatedData['kendaraan_id'];
        $sewa->total_harga = $totalHarga;

        // Save the Sewa instance
        $sewa->save();

        // Redirect to a relevant route, for example, show the created Sewa instance
        return redirect()->route('order.index')->with('success', 'Sewa created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $order): View
    {
        return view('user.order.order', compact('order'));
    }

    public function showDetail(Sewa $order): View
    {
        return view('user.order.detail', compact('order'));
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
