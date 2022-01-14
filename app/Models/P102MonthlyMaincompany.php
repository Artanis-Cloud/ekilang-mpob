<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102MonthlyMaincompany extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_monthly_maincompany';

    protected $fillable = [
        'tahun',
        'bulan',
        'syktinduk',
        'produk',
        'aktiviti',
        'kuantiti',

    ];
}
