<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukGroup extends Model
{
    use HasFactory;
    protected $table = 'produk_group';
    public $timestamps = false;

    protected $fillable = [
        'ProductGroup',
        'ProductGroupName',
    ];
}
