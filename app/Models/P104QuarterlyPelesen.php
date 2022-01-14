<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104QuarterlyPelesen extends Model
{
    use HasFactory;
    protected $table = 'p104_quarterly_pelesen';

    protected $fillable = [
        'p104_qtrid',
        'Year',
        'Activities',
        'LicenseNo',
        'ProductGroup',
        'ProductCategory',
        'ProductSubGroup',
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
