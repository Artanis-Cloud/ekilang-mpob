<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H07Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h07_init'; //penyata arkib (history) - pusat simpanan
    protected $primaryKey = 'e07_nobatch';
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [
        'e07_nobatch',
        'e07_nl',
        'e07_bln',
        'e07_thn',
        'e07_flg',
        'e07_sdate',
        'e07_ddate',
        'e07_npg',
        'e07_jpg',

    ];

    public function h07btranshipment()
    {

        return $this->hasOne(H07Btranshipment::class, 'e07_nobatch', 'e07bt_nobatch');
    }
}
