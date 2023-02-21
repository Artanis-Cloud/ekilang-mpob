<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H101Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h101_init';
    protected $primaryKey = 'e101_nobatch';
    public $timestamps = false;
    protected $keyType = 'string';

     //penyata arkib (history) - kilang penapis

    protected $fillable = [
        'e101_nobatch',
        'e101_nl',
        'e101_bln',
        'e101_thn',
        'e101_flg',
        'e101_sdate',
        'e101_ddate',
        'e101_a5',
        'e101_a6',
        'e101_a7',
        'e101_npg',
        'e101_jpg',

    ];

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e101_nl');
    }
    public function h_pelesen()
    {

        return $this->hasMany(HPelesen::class, 'e_nl', 'e101_nl');
    }

}
