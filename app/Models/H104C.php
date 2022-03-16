<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H104C extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h104_c'; //penyata arkib - kilang oleokimia
    protected $primaryKey = 'e104_c1';
    public $timestamps = false;

    protected $fillable = [
        'e104_c1',
        'e104_nobatch',
        'e104_c3',
        'e104_c4',
        'e104_c5',
        'e104_c6',
        'e104_c7',
        'e104_c8',

    ];

    public function h104init()
    {

        return $this->hasOne(H104Init::class, 'e104_nobatch', 'e104_nobatch');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'prodid', 'e104_c3');
    }
}
