<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCat2 extends Model
{
    use HasFactory;

    protected $table = 'prod_cat2';

    protected $fillable = [
        'catid',
        'catname',
    ];
}
