<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91ReceiveFfbState extends Model
{
    use HasFactory;
    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_receive_ffb_state';

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'bilpelesen',
        'sstock',
        'rec',
        'proc',
        'sell',
        'estock',
        'price',
        'tes',
        'tel',
        'tbp',
        'tpk',
        'tkb',
        'tll',
    ];
}
