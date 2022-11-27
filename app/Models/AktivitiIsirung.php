<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitiIsirung extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'aktiviti_isirong'; //aktiviti isirung
    public $timestamps = false;


    protected $fillable = [
        'Activities',
        'ActivitiesName',
    ];
}
