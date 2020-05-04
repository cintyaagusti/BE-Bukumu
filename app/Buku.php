<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_buku','id_kategori','id_penerbit','judul','pengarang','tahun_terbit', 'harga','stok'
    ];

    public function kategori_buku()
    {
        return $this->belongsTo('App\Jobs','id_kategori','id_kategori');
        
    }

    public function penerbit()
    {
        return $this->belongsTo('App\Jobs','id_penerbit','id_penerbit');
        
    }
}