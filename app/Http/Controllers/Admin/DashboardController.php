<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusSewaType;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPembayaran = Pembayaran::sum('jumlah_dibayarkan');
        $totalPembayaran = $this->formatToRupiah($totalPembayaran);
        $sewas = Sewa::where('status_sewa', StatusSewaType::MENUNGGU)->get()->sortByDesc('tanggal_sewa');
        $pembayarans = Pembayaran::where('status_pembayaran', 'menunggu')->get();
        return view('admin.index', compact('totalPembayaran', 'sewas', 'pembayarans'));
    }

    private function formatToRupiah($totalPembayaran)
    {
        return "Rp " . number_format($totalPembayaran, 2, ',', '.');
    }
}
