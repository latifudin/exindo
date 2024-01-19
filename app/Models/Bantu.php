<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantu extends Model
{
    use HasFactory;

    protected $table = 'bantu';

    protected $fillable = [
        'bantukat'
    ];

    public function bantu()
    {
        return $this->belongsTo(Bantu::class);
    }
}
