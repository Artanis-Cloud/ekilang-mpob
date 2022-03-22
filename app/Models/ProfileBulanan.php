<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBulanan extends Model
{
    use HasFactory;

 /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'profile_bulanans'; //penyata arkib (history) - pusat simpanan
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [

    'id',
    'no_lesen',
    'no_lesen_KPPK' ,
    'n_premis' ,
    'srkt_induk' ,
    'no_tel' ,
    'no_faks' ,
    'no_pgw_m' ,
    'j_pgw_m' ,
    'n_pgw_b' ,
    'j_pgw_b' ,
    'tarikh_lapor' ,
    'bulan' ,
    'tahun' ,
    'tarikh_hantar' ,
    'alamat_premis' ,
    'negeri_premis' ,
    'daerah_premis' ,
    'poskod_premis' ,
    'alamat_surat' ,
    'negeri' ,
    'daerah' ,
    'poskod' ,
    'jenis' ,
    'nama_admin' ,
    ];
}
