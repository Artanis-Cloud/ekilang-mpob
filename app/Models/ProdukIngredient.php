<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukIngredient extends Model
{
    use HasFactory;
    protected $table = 'produk_ingredient';

    protected $fillable = [
        'ProductIngredient',
        'ProductIngredientName',
    ];
}
