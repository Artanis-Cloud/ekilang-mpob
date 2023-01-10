<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class FailLain extends Model
{
    use HasApiTokens, HasFactory, Notifiable;




    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'fail_lain'; //email
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [

        'id',
        'file_upload',
        'date',

    ];
}
