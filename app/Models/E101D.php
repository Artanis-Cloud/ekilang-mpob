<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101D extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_d'; //penyata bulanan terkini - kilang penapis

    protected $fillable = [
        'e101_d1',
        'e101_reg',
        'e101_d3',
        'e101_d4',
        'e101_d5',
        'e101_d6',
        'e101_d7',
        'e101_d8',

    ];
}
