<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class KategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Pemograman'],
            ['Psikologi'],
            ['Agama'],
        ];

        for ($i=0; $i < count($data); $i++) {
            $nama_kategori = $data[$i][0];
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('kategori_buku')->insert([
                'nama_kategori' => $nama_kategori, 
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
