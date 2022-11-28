<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCat extends Model
{
    use HasFactory;
    protected $table = 'prod_cat';
    public $timestamps = false;

    protected $fillable = [
        'catid',
        'catname',
    ];
}
