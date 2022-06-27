<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapasiti extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'kapasiti'; //bulan
    public $timestamps = false;
    protected $fillable = [
        'id',
        'e_nl',
        'tahun',
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12',

    ];

    public function pelesen()
    {

        return $this->hasOne (Pelesen::class, 'e_nl', 'e_nl');
    }
}
