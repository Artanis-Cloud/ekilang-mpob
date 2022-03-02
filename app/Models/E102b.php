<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E102b extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e102b'; //penyata bulanan terkini - kilang pelumat isirung
    protected $primaryKey = 'e102_b1';
    public $timestamps = false;
    protected $fillable = [
        'e102_b1',
        'e102_b2',
        'e102_b3',
        'e102_b4',
        'e102_b5',
        'e102_b6',

    ];


    public function e102init()
    {

        return $this->hasMany(E102Init::class, 'e102_reg', 'e102_b2');
    }
    public function kodsl()
    {

        return $this->hasMany(KodSl::class, 'catid', 'e102_b4');
    }
    public function prodcat2()
    {

        return $this->hasMany(ProdCat2::class, 'catid', 'e102_b5');
    }

}
