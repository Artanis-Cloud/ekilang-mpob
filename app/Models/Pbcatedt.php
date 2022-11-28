<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbcatedt extends Model
{
    use HasFactory;
    protected $table = 'pbcatedt';
    public $timestamps = false;

    protected $fillable = [
        'pbe_name',
        'pbe_edit',
        'pbe_type',
        'pbe_cntr',
        'pbe_seqn',
        'pbe_flag',
        'pbe_work',
    ];
}
