<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Sewa;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();
        $sewas = Sewa::with('user', 'kendaraan')->where('Users_id', $userId)->get();
        return view('user.order.index', compact('sewas'));
    }}
