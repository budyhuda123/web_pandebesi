<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_pdk', 'gambar_pdk', 'type_pdk', 'deskripsi_pdk', 'harga_pdk', 'jumlah_pdk'
    ];
}
