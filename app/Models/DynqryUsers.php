<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynqryUsers extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'dynqry_users';
    public $timestamps = false;

    protected $fillable = [
        'login',
        'password',
        'name',
        'email',
    ];
}
