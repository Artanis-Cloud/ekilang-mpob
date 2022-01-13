<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91SellPkState extends Model
{
    use HasFactory;

/**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'aktiviti_isirong';

    protected $fillable = [


    'tahun',
    'bulan',
    'negeri',
    'bilpelesen',
    'sstock',
    'rec',
    'proc',
    'sell',
    'export',
    'estock',
    'jki',
    'jp',
    'jll',
];
}
