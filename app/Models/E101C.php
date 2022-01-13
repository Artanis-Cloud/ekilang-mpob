<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101C extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_c'; //penyata bulanan terkini - kilang penapis

    protected $fillable = [
        'e101_c1',
        'e101_reg',
        'e101_c3',
        'e101_c4',
        'e101_c5',
        'e101_c6',
        'e101_c7',
        'e101_c8',
        'e101_c9',
        'e101_c10',

    ];
}
