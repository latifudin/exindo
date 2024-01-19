<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'image',
        'judul',
        'harga',
        'diskon',
        'detail',
    ];

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_produk');
    }

}
