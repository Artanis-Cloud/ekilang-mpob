<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102QuarterlyMaincompany extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_quarterly_maincompany';

    protected $fillable = [
        'tahun',
        'syktinduk',
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
