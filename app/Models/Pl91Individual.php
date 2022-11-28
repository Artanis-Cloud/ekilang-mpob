<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pl91Individual extends Model
{
    use HasFactory;
    protected $table = 'pl91_individual';
    public $timestamps = false;

    protected $fillable = [
        'ind_id',
        'no_lesen',
        'bulan',
        'tahun',
        'ffb_sstock',
        'cpo_sstock',
        'pk_sstock',
        'so_sstock',
        'ffb_rec',
        'cpo_rec',
        'pk_rec',
        'so_rec',
        'ffb_proc',
        'cpo_prod',
        'pk_prod',
        'so_prod',
        'ffb_sell',
        'cpo_sell',
        'pk_sell',
        'so_sell',
        'cpo_export',
        'pk_export',
        'so_export',
        'ffb_estock',
        'cpo_estock',
        'pk_estock',
        'so_estock',
        'mill_hrs',
        'mill_oer_cpo',
        'mill_ker_pk',
        'ffb_price',
        'ffb_tes',
        'ffb_tel',
        'ffb_tpb',
        'ffb_tpk',
        'ffb_tkb',
        'ffb_tll',
        'cpo_jkb',
        'cpo_jkp',
        'cpo_jko',
        'cpo_jp',
        'cpo_jps',
        'cpo_je',
        'cpo_jt',
        'cpo_jll',
        'pk_jki',
        'pk_jp',
        'pk_jll',
        'mill_capacity',
        'mill_utilrate',
    ];
}
