<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [1, 1,'Negeri 5 Menara','Asya','2012','25000','100'],
            [1,1,'Negeri 5 Menara','Asya','2012','25000','100'],
        ];

        for ($i=0; $i < count($data); $i++) {
            $id_kategori = $data[$i][0];
            $id_penerbit = $data[$i][1];
            $judul = $data[$i][2];
            $pengarang = $data[$i][3];
            $tahun_terbit = $data[$i][4];
            $harga = $data[$i][5];
            $stok = $data[$i][6];
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('buku')->insert([
                'id_kategori' => $id_kategori, 
                'id_penerbit' => $id_penerbit, 
                'judul' => $judul,
                'pengarang' => $pengarang,
                'tahun_terbit' => $tahun_terbit,
                'harga' => $harga,
                'stok' => $stok,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}

