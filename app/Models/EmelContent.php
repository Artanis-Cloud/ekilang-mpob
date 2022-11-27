<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmelContent extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'emel_content'; //content emel
    public $timestamps = false;


    protected $fillable = [
        'Id',
        'tajuk',
        'kandungan',

    ];
}
