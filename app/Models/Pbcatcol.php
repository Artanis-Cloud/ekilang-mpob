<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbcatcol extends Model
{
    use HasFactory;
    protected $table = 'pbcatcol';

    protected $fillable = [
        'pbc_tnam',
        'pbc_tid',
        'pbc_ownr',
        'pbc_cnam',
        'pbc_cid',
        'pbc_labl',
        'pbc_lpos',
        'pbc_hdr',
        'pbc_hpos',
        'pbc_jtfy',
        'pbc_mask',
        'pbc_case',
        'pbc_hght',
        'pbc_wdth',
        'pbc_ptrn',
        'pbc_bmap',
        'pbc_init',
        'pbc_cmnt',
        'pbc_edit',
        'pbc_tag',
    ];
}
