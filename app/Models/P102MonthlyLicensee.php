<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102MonthlyLicensee extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_monthly_licensee';

    protected $fillable = [
        'tahun',
        'bulan',
        'nolesen',
        'produk',
        'aktiviti',
        'kuantiti',

    ];
}
