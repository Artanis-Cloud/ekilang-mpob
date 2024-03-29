<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E104C extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e104_c'; //penyata bulanan terkini - kilang oleokimia
    protected $primaryKey = 'e104_c1';
    public $timestamps = false;

    protected $fillable = [
        'e104_c1',
        'e104_reg',
        'e104_c3',
        'e104_c4',
        'e104_c5',
        'e104_c6',
        'e104_c7',
        'e104_c8',

    ];
    
    public function e104init(){
        return $this->hasOne(E104Init::class,'e104_reg', 'e104_reg');
    }

    public function produk(){
        return $this->hasOne(Produk::class,'prodid','e104_c3');
    }
}
