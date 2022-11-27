<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KilangTidakRespons extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'kilang_tidak_respons';
    public $timestamps = false;


    protected $fillable = [
        'No_Lesen',

    ];
}
