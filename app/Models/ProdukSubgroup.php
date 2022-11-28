<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSubgroup extends Model
{
    use HasFactory;
    protected $table = 'produk_subgroup';
    public $timestamps = false;

    protected $fillable = [
        'kod_subgroup',
        'nama_subgroup',
    ];
}
