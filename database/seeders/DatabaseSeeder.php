<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\RolesType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('passwordAdmin'),
            'role' => RolesType::ADMIN,
        ]);
        User::factory()->create([
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => bcrypt('passwordUser'),
                'role' => RolesType::USER,
            ]);
        User::factory()->create(
            [
                'name' => 'Owner User',
                'email' => 'owner@mail.com',
                'password' => bcrypt('passwordOwner'),
                'role' => RolesType::OWNER,
            ]);
        DB::beginTransaction();
        try {
            $this->seedData();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function seedData()
    {


        $this->call([
            TipeKendaraanSeeder::class,
            LokasiKendaraanSeeder::class,
            PemilikSeeder::class,
            KendaraanSeeder::class,
        ]);
    }
}
