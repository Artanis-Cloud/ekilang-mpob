<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102MonthlyStateCrshrs extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_monthly_state_crshrs';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'crs_hours',

    ];
}
