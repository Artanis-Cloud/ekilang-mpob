<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H101D extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h101_d'; //penyata arkib (history) - kilang penapis
    protected $primaryKey = 'e101_d1';
    public $timestamps = false;

    protected $fillable = [
        'e101_d1',
        'e101_nobatch',
        'e101_d3',
        'e101_d4',
        'e101_d5',
        'e101_d6',
        'e101_d7',
        'e101_d8',

    ];


    public function h101init()
    {

        return $this->hasOne(H101Init::class, 'e101_nobatch', 'e101_nobatch');
    }

    public function prodcat()
    {
        return $this->hasOne(ProdCat::class, 'catid', 'e101_d4');
    }
}
