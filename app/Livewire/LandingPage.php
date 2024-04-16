<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\TipeKendaraan;
use Livewire\Component;

class LandingPage extends Component
{
    public string $search = '';
    public string $tipeKendaraan = '';
    public function filterByType($tipeKendaraan)
    {
        $this->tipeKendaraan = $tipeKendaraan;
    }
    public function clearFilter()
    {
        $this->tipeKendaraan = '';
    }
    public function render()
    {
        $tipeKendaraans = TipeKendaraan::all();
        if ($this->search != '') {
            $kendaraans = Kendaraan::where('name', 'like', '%' . $this->search . '%')->get();
        }elseif ($this->tipeKendaraan != '') {
            $kendaraans = Kendaraan::where('tipe_kendaraan_id', $this->tipeKendaraan)->get();
        }else{
        $kendaraans = Kendaraan::all();
        }
        return view('livewire.landing-page',compact('kendaraans','tipeKendaraans'));
    }
}
