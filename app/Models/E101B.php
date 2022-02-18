<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101B extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_b'; //penyata bulanan terkini - kilang penapis
    protected $primaryKey = 'e101_b1';
    public $timestamps = false;

    protected $fillable = [
        'e101_b1',
        'e101_reg',
        'e101_b3',
        'e101_b4',
        'e101_b5',
        'e101_b6',
        'e101_b7',
        'e101_b8',
        'e101_b9',
        'e101_b10',
        'e101_b11',
        'e101_b12',
        'e101_b13',
        'e101_b14',

    ];


    // public function e101init()
    // {
    //     return $this->hasOne(E101Init::class, 'e101_reg', 'e101_reg');
    // }


    // public function e101init_produk()
    // {
    //     return $this->hasOneThrough(
    //         Produk::class,
    //         E101Init::class,
    //         'e101_reg', // Foreign key on the owners table...
    //         'prodid', // Foreign key on the cars table...

    //         'e101_b1', // Local key on the mechanics table...
    //         'e101_reg' // Local key on the cars table...
    //     );
    // }

    // public function e101init_produk()
    // {
    //     return $this->hasOneThrough(E101Init::class, Produk::class);
    // }

    public function e101init()
    {

        return $this->hasMany(E101Init::class, 'e101_reg', 'e101_b1');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'e101_b4', 'produk');
    }
}
