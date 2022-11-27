<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'jenis_produk';
    public $timestamps = false;


    protected $fillable = [
        'kod_produk',
        'nama_produk',
        'nama_column',

    ];
}
