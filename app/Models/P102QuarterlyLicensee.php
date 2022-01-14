<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102QuarterlyLicensee extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_quarterly_licensee';

    protected $fillable = [
        'tahun',
        'nolesen',
        'namapremis',
        'produk',
        'aktiviti',
        'Jan',
        'Feb',
        'Mar',
        'Quarter1',
        'Apr',
        'May',
        'Jun',
        'Quarter2',
        'FirstHalf',
        'Jul',
        'Aug',
        'Sep',
        'Quarter3',
        'SecondHalf',
        'Oct',
        'Nov',
        'Dece',
        'Quarter4',
        'TotalAll',
    ];
}
