<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekmessage extends Model
{
    use HasFactory;



    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekmessage'; //email
    protected $primaryKey = 'MsgID';

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

    ];
}
