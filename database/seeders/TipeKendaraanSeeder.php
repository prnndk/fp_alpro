<?php

namespace Database\Seeders;

use App\Models\TipeKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Motor',
            ],
            [
                'id' => 2,
                'name' => 'Mobil',
            ],
            [
                'id' => 3,
                'name' => 'Truk',
            ],
            [
                'id' => 4,
                'name' => 'Bus',
            ],
            [
                'id' => 5,
                'name' => 'Minibus',
            ],
            [
                'id' => 6,
                'name' => 'Pesawat',
            ],
            [
                'id' => 7,
                'name' => 'Sepeda',
            ],
            [
                'id' => 8,
                'name' => 'Pickup',
            ],
        ];
        foreach ($data as $item) {
            TipeKendaraan::create($item);
        }
    }
}
