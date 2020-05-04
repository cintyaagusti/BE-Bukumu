<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategori_buku';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'id_kategori','nama_kategori'
    ];
}