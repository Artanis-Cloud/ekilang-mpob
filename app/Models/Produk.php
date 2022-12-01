<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    public $timestamps = false;

    protected $fillable = [
        'prodid',
        'prodname',
        'prodcat',
        'proddesc',
        'prodtariff1',
        'prodtariff2',
        'prodtariff3',
        'sub_group',
        'sub_group_rspo',
        'sub_group_mspo',
    ];

    public function kump_produk()
    {

        return $this->hasOne(KumpProduk::class, 'kumpulan', 'prodcat');
    }
}
