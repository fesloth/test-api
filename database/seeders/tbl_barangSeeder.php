<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB Facade

class tbl_barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // data faker
    //  public function run(): void
    //  {
    //      $faker = \Faker\Factory::create();

    //      foreach (range(1, 10) as $index) { 
    //          DB::table('tbl_barang')->insert([
    //              'namaBarang' => $faker->name,
    //              'deskripsiBarang' => $faker->text,
    //              'harga' => $faker->randomNumber(5),
    //          ]);
    //      }
    //  }

    public function run(): void
    {
        DB::table('tbl_barang')->insert([
            'namaBarang' => 'Kotak Pensil',
            'deskripsiBarang' => 'Warna biru, ukuran sedang',
            'harga' => 15000
        ]);
        DB::table('tbl_barang')->insert([
            'namaBarang' => 'Pulpen',
            'deskripsiBarang' => 'Rollerball pen',
            'harga' => 7000
        ]);
    }
}
