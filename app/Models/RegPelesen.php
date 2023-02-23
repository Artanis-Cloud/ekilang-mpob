<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class RegPelesen extends Authenticatable
{
    use HasFactory;

    protected $table = 'reg_pelesen';
    protected $primaryKey = 'e_id';
    public $timestamps = false;

    protected $hidden = [
        'e_pwd',
       ];

    protected $fillable = [
        'e_id',
        'e_nl',
        'e_kat',
        'e_pwd', //!important : need to expand data size in database
        'kodpgw',
        'nosiri',
        'e_status',
        'e_stock',
        'directory',
    ];

    public function getAuthPassword()
    {
     return $this->e_pwd;
    }

    public function pelesen()
    {

        return $this->hasMany(Pelesen::class, 'e_nl', 'e_nl');
    }

    public static function getPelesenBuah()
    {
        $pelesen = DB::table('reg_pelesen')->select('e_nl','e_np','e_email','e_notel','kodpgw','nosiri','e_status','e_stock','directory');
        // if ($pelesen->e_status == 1) return 'Aktif';

        // if ($pelesen->e_status == 2) return 'Tidak Aktif';

        return $pelesen;
    }

    // public function getStatus()
    // {
    //     if ($this->e_status == 1) return 'Aktif';

    //     if ($this->e_status == 2) return 'Tidak Aktif';

    //     return 'Tiada';
    // }

}
