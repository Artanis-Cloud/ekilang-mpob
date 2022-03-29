<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101D extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_d'; //penyata bulanan terkini - kilang penapis

    protected $primaryKey = 'e101_d1';
    public $timestamps = false;

    protected $fillable = [
        'e101_d1',
        'e101_reg',
        'e101_d3',
        'e101_d4',
        'e101_d5',
        'e101_d6',
        'e101_d7',
        'e101_d8',

    ];



    public function e101init()
    {

        return $this->hasOne(E101Init::class, 'e101_reg', 'e101_reg');
    }

    public function prodcat()
    {
        return $this->hasOne(ProdCat::class, 'catid', 'e101_d4');
    }

    public function kodsl()
    {
        return $this->hasOne(KodSl::class, 'catid', 'e101_d3');
    }

}
