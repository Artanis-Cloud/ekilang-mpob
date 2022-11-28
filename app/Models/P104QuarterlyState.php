<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104QuarterlyState extends Model
{
    use HasFactory;
    protected $table = 'p104_quarterly_state';
    public $timestamps = false;

    protected $fillable = [
        'p101_qtrid',
        'Year',
        'Activities',
        'State',
        'ProductGroup',
        'ProductSubGroup',
        'ProductCategory',
        'Product',
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
