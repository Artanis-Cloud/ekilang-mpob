<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StkNegeri extends Model
{
    use HasFactory;

    protected $table = 'stknegeri';
    public $timestamps = false;

    protected $fillable = [
        'stknegeri_id',
        'tahun',
        'bulan',
        'negeri',
        'millstk_cpo',
        'millstk_pk',
        'crsstk_cpko',
        'crsstk_pk',
        'crsstk_pkc',
        'refstk_cps',
        'refstk_cpl',
        'refstk_rbdpo',
        'refstk_rbdpl',
        'refstk_rbdps',
        'refstk_pfad',
        'refstk_co',
        'refstk_cpo',
        'refstk_ppo',
        'refstk_cpko',
        'refstk_ppko',
        'refstk_mar',
        'refstk_ghee',
        'refstk_fat',
        'refstk_short',
        'refstk_coco',
        'refstk_soap',
        'refstk_redol',
        'refstk_pry',
        'refstk_blend',
        'refstk_otheredb',
        'refstk_othernot',
        'oleostk_cps',
        'oleostk_cpl',
        'oleostk_rbdpo',
        'oleostk_rbdpl',
        'oleostk_rbdps',
        'oleostk_pfad',
        'oleostk_cpo',
        'oleostk_ppo',
        'oleostk_cpko',
        'oleostk_ppko',
        'bulkstk_cpo',
        'bulkstk_ppo',
        'bulkstk_cpko',
        'bulkstk_ppko',
        'stk_cpo',
        'stk_ppo',
        'stk_cpko',
        'stk_ppko',
        'stk_pk',
        'stk_pkc',
        'biostk_rbdpo',
        'biostk_rbdpl',
        'biostk_rbdps',
        'biostk_pfad',
        'bulkstk_rbdpo',
        'bulkstk_rbdpl',
        'bulkstk_rbdps',
        'bulkstk_pfad',
        'refstk_rbdpko',
        'refstk_rbdpkl',
        'refstk_rbdpks',
        'refstk_pkfad',
        'biostk_rbdpko',
        'biostk_rbdpkl',
        'biostk_rbdpks',
        'biostk_pkfad',
        'bulkstk_rbdpko',
        'bulkstk_rbdpkl',
        'bulkstk_rbdpks',
        'bulkstk_pkfad',
        'oleostk_rbdpko',
        'oleostk_rbdpkl',
        'oleostk_rbdpks',
        'oleostk_pkfad',

    ];
}
