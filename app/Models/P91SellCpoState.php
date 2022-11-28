<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91SellCpoState extends Model
{
    use HasFactory;



    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_sell_cpo_state';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'bilpelesen',
        'sstock',
        'rec',
        'prod',
        'sell',
        'export',
        'estock',
        'jkb',
        'jkp',
        'jko',
        'jp',
        'jps',
        'je',
        'jt',
        'jll',
    ];
}
