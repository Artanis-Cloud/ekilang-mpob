<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101QuarterlyState extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_quarterly_state';

    protected $fillable = [
        'p101_qtrid',
        'Year',
        'Activities',
        'State',
        'ProductGroup',
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
