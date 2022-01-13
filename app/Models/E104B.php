<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E104B extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e104_b'; //penyata bulanan terkini - kilang oleokimia

    protected $fillable = [
        'e104_b1',
        'e104_reg',
        'e104_b3',
        'e104_b4',
        'e104_b5',
        'e104_b6',
        'e104_b7',
        'e104_b8',
        'e104_b9',
        'e104_b10',
        'e104_b11',
        'e104_b12',
        'e104_b13',

    ];
}
