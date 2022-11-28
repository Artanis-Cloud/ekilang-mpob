<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbcatvld extends Model
{
    use HasFactory;
    protected $table = 'pbcatvld';
    public $timestamps = false;

    protected $fillable = [
        'pbv_name',
        'pbv_vald',
        'pbv_type',
        'pbv_cntr',
        'pbv_msg',
    ];
}
