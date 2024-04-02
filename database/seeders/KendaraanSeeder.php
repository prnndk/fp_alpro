<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner_id = 1;
        $data = [
            [
                'name'=> 'ZX-10R',
                'merk'=> 'Kawasaki',
                'plat_nomor'=> 'B 1234 ABC',
                'warna'=> 'Merah',
                'harga'=> 100000,
                'kondisi'=> 'Lecet bagian kanan, mesin normal',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Ninja 250',
                'merk'=> 'Kawasaki',
                'plat_nomor'=> 'B 5678 DEF',
                'warna'=> 'Hijau',
                'harga'=> 50000,
                'kondisi'=> 'Mesin normal, karburator bocor',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'CBR 250',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 9012 GHI',
                'warna'=> 'Hitam',
                'harga'=> 75000,
                'kondisi'=> 'Mesin normal, karburator bocor',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'CBR 150',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 3456 JKL',
                'warna'=> 'Putih',
                'harga'=> 40000,
                'kondisi'=> 'Mesin normal, karburator bocor',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Vario 125',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 7890 MNO',
                'warna'=> 'Biru',
                'harga'=> 30000,
                'kondisi'=> 'Mesin normal, karburator bocor',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Vario 150',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 1234 PQR',
                'warna'=> 'Putih',
                'harga'=> 35000,
                'kondisi'=> 'Mesin normal, karburator bocor',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Vario 125',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 5678 STU',
                'warna'=> 'Merah',
                'harga'=> 30000,
                'kondisi'=> 'Mesin normal, knalpot modif, spion kanan copot',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Vario 125',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 5678 STU',
                'warna'=> 'Merah',
                'harga'=> 30000,
                'kondisi'=> 'Mesin normal, knalpot modif, spion kanan copot',
                'tipe_kendaraan_id'=> 1,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Honda Mobilio 2013',
                'merk'=> 'Honda',
                'plat_nomor'=> 'B 9031 ACS',
                'warna'=> 'Abu-abu',
                'harga'=> 150000,
                'kondisi'=> 'Body depan penyok, body samping lecet',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2015',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 1234 BCD',
                'warna'=> 'Putih',
                'harga'=> 200000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2016',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 5678 CDE',
                'warna'=> 'Hitam',
                'harga'=> 250000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2017',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 9012 DEF',
                'warna'=> 'Merah',
                'harga'=> 300000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2018',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 3456 EFG',
                'warna'=> 'Biru',
                'harga'=> 350000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2019',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 7890 FGH',
                'warna'=> 'Putih',
                'harga'=> 400000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
            [
                'name'=> 'Toyota Avanza 2020',
                'merk'=> 'Toyota',
                'plat_nomor'=> 'B 1234 GHI',
                'warna'=> 'Hitam',
                'harga'=> 450000,
                'kondisi'=> 'Body samping lecet, mesin normal',
                'tipe_kendaraan_id'=> 2,
                'pemilik_id'=> $owner_id,
            ],
        ];
        foreach ($data as $item) {
            Kendaraan::create($item);
        }
//        Kendaraan::create($data);
    }
}
