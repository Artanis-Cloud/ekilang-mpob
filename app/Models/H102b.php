<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H102b extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h102b'; //penyata arkib (history) - kilang isirung
    protected $primaryKey = 'e102_b1';
    public $timestamps = false;
    protected $fillable = [
        'e102_b1',
        'e102_nobatch',
        'e102_b3',
        'e102_b4',
        'e102_b5',
        'e102_b6',

    ];


    public function h102init()
    {

        return $this->hasMany(H102Init::class, 'e102_nobatch', 'e102_nobatch');
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
