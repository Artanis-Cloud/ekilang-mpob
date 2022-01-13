<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E91b extends Model
{
    use HasFactory;
/**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e91b';

    protected $fillable = [
        'e91_b1',
        'e91_b2',
        'e91_b6',
        'e91_b7',
        'e91_b8',
        'e91_b9',
        'e91_b10',
        'e91_b11',
    ];

}

