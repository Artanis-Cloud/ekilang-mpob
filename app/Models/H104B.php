<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H104B extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h104_b'; //penyata arkib (history) - kilang oleokimia
    protected $primaryKey = 'e104_b1';
    public $timestamps = false;

    protected $fillable = [
        'e104_b1',
        'e104_nobatch',
        'e104_b3',
        'e104_b4',
        'e104_b5',
        'e104_b6',
        'e104_b7',
        'e104_b8',
        'e104_b9',
        'e104_b10',
        'e104_b11',
        'e104_b12',
        'e104_b13',

    ];

    public function h104init()
    {

        return $this->hasOne(H104Init::class, 'e104_nobatch', 'e104_nobatch');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'prodid', 'e104_b4');
    }
}
