<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102YearlyStatePurchase extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_yearly_state_purchase';
    public $timestamps = false;

    protected $fillable = [
        'nolesen',
        'tahun',
        'bulan',
        'negeri',
        'jenis_aktiviti',
        'jenis_kilang',
        'produk',
        'kuantiti',

    ];
}
