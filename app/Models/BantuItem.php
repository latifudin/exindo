<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuItem extends Model
{
    use HasFactory;

    protected $table = 'bantuitem';

    protected $fillable = [
        'bantu_id',
        'judul',
        'isi'
    ];

    public function bantuitem()
    {
        return $this->hasMany(BantuItem::class);
    }
}
