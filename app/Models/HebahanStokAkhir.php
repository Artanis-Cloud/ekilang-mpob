<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HebahanStokAkhir extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'hebahan_stok_akhir'; //Penyata bulanan terkini - Kilang Buah (initialize - proses 3)
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
            'id',
            'tahun',
            'bulan',
            'cpo_sm',
            'ppo_sm',
            'cpko_sm',
            'ppko_sm',
            'cpo_sbh',
            'ppo_sbh',
            'cpko_sbh',
            'ppko_sbh',
            'cpo_srwk',
            'ppo_srwk',
            'cpko_srwk',
            'ppko_srwk',
        ];
    }

