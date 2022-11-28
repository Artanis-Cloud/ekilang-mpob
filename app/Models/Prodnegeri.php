<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodnegeri extends Model
{
    use HasFactory;
    protected $table = 'prodnegeri';
    public $timestamps = false;

    protected $fillable = [
        'prodnegeri_id',
        'tahun',
        'bulan',
        'negeri',
        'cpo',
        'pk',
        'ffb_proc',
        'ffb_rec',
        'mill_millhrs',
        'ffb_millcapacity',
        'mill_utilrate',
        'cpko',
        'pkc',
        'pk_proc',
        'crusher_crshrs',
        'pk_crscapacity',
        'crusher_utilrate',
        'refprod_cps',
        'refprod_cpl',
        'refprod_rbdpo',
        'refprod_rbdpl',
        'refprod_rbdps',
        'refprod_pfad',
        'refprod_co',
        'refproc_cpo',
        'refproc_cpko',
        'refcap',
        'refutilrate',
        'reffp_mar',
        'reffp_ghee',
        'reffp_fat',
        'reffp_short',
        'reffp_coco',
        'reffp_soap',
        'reffp_redol',
        'reffp_pry',
        'reffp_blend',
        'reffp_otheredb',
        'reffp_othernot',
        'oleoprod_cps',
        'oleoprod_cpl',
        'oleoprod_rbdpo',
        'oleoprod_rbdpl',
        'oleoprod_rbdps',
        'oleoprod_pfad',
        'oleoproc_cpo',
        'oleoproc_cpko',
        'oleocap',
        'oleoutilrate',
        'oleoproc_ppo',
        'oleoproc_ppko',
        'ffb_millno',
        'pk_crsno',
        'ref_no',
        'oleo_no',
        'mill_actualmillhrs	',
    ];
}
