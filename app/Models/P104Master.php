<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104Master extends Model
{
    use HasFactory;
    protected $table = 'p104_master';
    public $timestamps = false;

    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'harioperasi',
        'capacity_dec',
        'cpo_proc',
        'cpko_proc',
        'oleokap',
        'oleoutilrate',
        'statusaktif',
        'oleoutilratecpo',
        'oleoutilratecpko',
        'ppo_proc',
        'ppko_proc',
        'oleoutilrateppo',
        'oleoutilrateppko',
        'po_proc',
        'oleoutilratepo',
    ];
}
