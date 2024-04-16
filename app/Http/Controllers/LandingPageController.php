<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\TipeKendaraan;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage');
    }
}
