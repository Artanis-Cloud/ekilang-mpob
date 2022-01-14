<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbcatfmt extends Model
{
    use HasFactory;
    protected $table = 'pbcatfmt';

    protected $fillable = [
        'pbf_name',
        'pbf_frmt',
        'pbf_type',
        'pbf_cntr',
    ];
}
