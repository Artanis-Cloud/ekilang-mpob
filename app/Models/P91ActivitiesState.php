<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91ActivitiesState extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_activities_state';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'produk',
        'bilpelesen',
        'stkawal',
        'terimaan',
        'proses',
        'pengeluaran',
        'jualan',
        'eksport',
        'stkakhir',

    ];
}
