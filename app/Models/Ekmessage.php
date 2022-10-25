<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ekmessage extends Model
{
    use HasApiTokens, HasFactory, Notifiable;




    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekmessage'; //email
    protected $primaryKey = 'MsgID';
    public $timestamps = false;

    protected $fillable = [

        'Date',
        'FromName',
        'FromLicense',
        'FromEmail',
        'Category',
        'TypeOfEmail',
        'Subject',
        'Message',
        'Status',
        'file_upload',

    ];
}
