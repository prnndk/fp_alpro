<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\TipeKendaraan;

class LandingPageController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('tipe_kendaraan')->get();
        $tipeKendaraans = TipeKendaraan::all();

        return view('landingpage', compact('kendaraans', 'tipeKendaraans'));
    }
}
