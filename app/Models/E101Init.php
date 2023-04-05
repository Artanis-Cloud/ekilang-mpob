<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_init'; //penyata bulanan terkini - kilang penapis (initialize - proses 3)
    protected $primaryKey = 'e101_reg';
    public $timestamps = false;

    protected $fillable = [
        'e101_reg',
        'e101_nl',
        'e101_bln',
        'e101_thn',
        'e101_flg',
        'e101_sdate',
        'e101_ddate',
        'e101_a1',
        'e101_a2',
        'e101_a3',
        'e101_npg',
        'e101_jpg',
        'e101_flagcetak',

    ];

    public function e101b()
    {

        return $this->hasOne(E101B::class, 'e101_reg', 'e101_reg');
    }

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e101_nl');
    }
    public function regpelesen()
    {

        return $this->hasOne(RegPelesen::class, 'e_nl', 'e101_nl')->where('e_kat', 'PL101');;
    }


}
