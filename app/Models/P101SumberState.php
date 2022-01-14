<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101SumberState extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_sumber_state';

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'produk_kump',
        'KB',
        'KP',
        'KI',
        'KO',
        'PS',
        'PN',
        'EX',
        'IM',
        'LL',
        'KB2',
        'KP2',
        'KI2',
        'KO2',
        'PS2',
        'PN2',
        'EX2',
        'IM2',
        'LL2',
        'totalval',
    ];
}
