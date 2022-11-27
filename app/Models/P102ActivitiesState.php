<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102ActivitiesState extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_activities_state';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'produk',
        'stkawal_premis',
        'stkawal_ps',
        'belian',
        'import',
        'proses',
        'pengeluaran',
        'jualan',
        'hantar',
        'eksport',
        'stkakhir_premis',
        'stkakhir_ps',

    ];
}
