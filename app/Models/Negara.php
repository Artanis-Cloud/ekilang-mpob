<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'negara';
    public $timestamps = false;


    protected $fillable = [
        'kodnegara',
        'namanegara',
        'benua',
        'eu15',
        'eu25',
        'eu27',
        'eu28',
        'eu27_2020',

    ];
}
