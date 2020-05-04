<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id_buku');
            $table->bigInteger('id_kategori')->unsigned();
            $table->bigInteger('id_penerbit')->unsigned();
            $table->string('judul', 100);
            $table->string('pengarang', 100);
            $table->bigInteger('tahun_terbit');
            $table->bigInteger('harga');
            $table->bigInteger('stok');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_buku');
            $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
