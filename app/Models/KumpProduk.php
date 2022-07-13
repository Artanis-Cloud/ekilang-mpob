<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KumpProduk extends Model
{
    use HasFactory;
    protected $table = 'kump_produk';

    protected $fillable = [
        'kumpulan',
        'nama_kumpulan',
    ];
}
