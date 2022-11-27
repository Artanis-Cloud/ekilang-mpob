<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynqryUserApplications extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'dynqry_user_applications';
    public $timestamps = false;

    protected $fillable = [
        'fk_user_login',
        'fk_interface_name',
    ];
}
