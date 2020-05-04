<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $fillable = [
        'id_penerbit', 'nama_penerbit','alamat','email','telp'
    ];

}