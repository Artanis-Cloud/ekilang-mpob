<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91ActivitiesLicensee extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_activities_licensee';

    protected $fillable = [
        'tahun',
        'bulan',
        'no_lesen',
        'produk',
        'stkawal',
        'terimaan',
        'proses',
        'pengeluaran',
        'jualan',
        'eksport',
        'stkakhir',
    ];
}
