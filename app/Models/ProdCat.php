<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCat extends Model
{
    use HasFactory;
    protected $table = 'prod_cat';

    protected $fillable = [
        'catid',
        'catname',
    ];
}
