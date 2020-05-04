<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Elexmedia Komputindo','Tanah Abang, RT.1/RW.2, Gelora, Kota Jakarta Pusat','elexmedia@gmail.com','02153650110'],
            ['Andi Publisher','Cipayung, Ceger, Cipayung, Kota Jakarta Timur','andi@gmail.com','02184590064'],
            ['Gagas Media','Ciganjur, Jagakarsa, Kota Jakarta Selatan','gagas@gmail.com','021839232820'],
        ];

        for ($i=0; $i < count($data); $i++) {
            $nama_penerbit = $data[$i][0];
            $alamat = $data[$i][1];
            $email = $data[$i][2];
            $telp = $data[$i][3];
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            DB::table('penerbit')->insert([
                'nama_penerbit' => $nama_penerbit,
                'alamat' => $alamat,
                'email' => $email,
                'telp' => $telp, 
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
