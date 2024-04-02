<?php

namespace Database\Seeders;

use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemilik::factory()->create([
            'id' => 1,
            'user_id' => 3,
            'phone' => '081234567890',
            'address' => 'Jl. Pemilik No. 1',
        ]);
    }
}
