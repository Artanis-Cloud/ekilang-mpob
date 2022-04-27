<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelesen extends Model
{
    use HasFactory;
    protected $table = 'pelesen';

    public $timestamps = false;
    protected $primaryKey = 'e_id';



    protected $fillable = [
        'e_id',
        'e_nl',
        'e_np',
        'e_ap1',
        'e_ap2',
        'e_ap3',
        'e_as1',
        'e_as2',
        'e_as3',
        'e_notel',
        'e_nofax',
        'e_email',
        'e_npg',
        'e_jpg',
        'e_notel_pg',
        'e_email_pg',
        'kodpgw',
        'nosiri',
        'e_npgtg',
        'e_jpgtg',
        'eqc_npg',
        'eqc_jpg',
        'eqc_email',
        'e_asnegeri',
        'e_asdaerah',
        'e_negeri',
        'e_daerah',
        'e_kawasan',
        'e_syktinduk',
        'stk_npg',
        'stk_notel',
        'stk_nofax',
        'stk_email',
        'stk_syktinduk',
        'stk_cpo_kap',
        'stk_rbdpo_kap',
        'stk_rbdpl_kap',
        'stk_rbdps_kap',
        'stk_lainppo_kap',
        'stk_ppo_kap',
        'stk_po_kap',
        'stk_pfad_kap',
        'e_group',
        'e_subgroup',
        'e_poma',
        'e_year',
        'e_cluster',
        'e_katkilang',
        'e_status',
        'e_email_pengurus',
        'kap_proses',
        'kap_tangki',
        'bil_tangki_cpo',
        'bil_tangki_ppo',
        'bil_tangki_cpko',
        'bil_tangki_ppko',
        'bil_tangki_oleo',
        'bil_tangki_others',
        'bil_tangki_jumlah',
        'kap_tangki_cpo',
        'kap_tangki_ppo',
        'kap_tangki_cpko',
        'kap_tangki_ppko',
        'kap_tangki_oleo',
        'kap_tangki_others',
        'kap_tangki_jumlah',

    ];
}
