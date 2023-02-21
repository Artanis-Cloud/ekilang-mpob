<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H104Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h104_init'; //penyata arkib - kilang oleokimia
    protected $primaryKey = 'e104_nobatch';
    protected $keyType = 'string';
    public $timestamps = false;


    protected $fillable = [
        'e104_nobatch',
        'e104_nl',
        'e104_bln',
        'e104_thn',
        'e104_flg',
        'e104_sdate',
        'e104_ddate',
        'e104_a5',
        'e104_a6',
        'e104_npg',
        'e104_jpg',

    ];

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e104_nl');
    }
    public function h_pelesen()
    {

        return $this->hasMany(HPelesen::class, 'e_nl', 'e104_nl');
    }
}
