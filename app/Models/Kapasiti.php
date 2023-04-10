<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapasiti extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'kapasiti'; //bulan
    public $timestamps = false;
    protected $fillable = [
        'id',
        'e_nl',
        'tahun',
        'jan',
        'feb',
        'mac',
        'apr',
        'mei',
        'jun',
        'jul',
        'ogs',
        'sept',
        'okt',
        'nov',
        'dec',

    ];

    public function pelesen()
    {

        return $this->hasOne (Pelesen::class, 'e_nl', 'e_nl')->where('e_kat', 'PLBIO');
    }


    public function user()
    {

        return $this->hasOne (User::class, 'username', 'e_nl');
    }
}
