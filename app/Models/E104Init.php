<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E104Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e104_init'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'e104_reg';
    public $timestamps = false;

    protected $fillable = [
        'e104_reg',
        'e104_nl',
        'e104_bln',
        'e104_thn',
        'e104_flg',
        'e104_sdate',
        'e104_ddate',
        'e104_a5',
        'e104_a6',
        'e104_npg',
        'e104_jpg',
        'e104_flagcetak',

    ];

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e104_nl');
    }
    public function regpelesen()
    {

        return $this->hasOne(RegPelesen::class, 'e_nl', 'e104_nl');
    }
}
