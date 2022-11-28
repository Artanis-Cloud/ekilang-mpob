<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pr extends Model
{
    use HasFactory;
    protected $table = 'pr';
    public $timestamps = false;

    protected $fillable = [
        'prodid',
        'prodnama',
        'prodcat',
        'proddesc',
    ];
}
