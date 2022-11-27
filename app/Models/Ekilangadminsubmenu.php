<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekilangadminsubmenu extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekilangadminsubmenu'; //table submenu (akses by admin)
    public $timestamps = false;


    protected $fillable = [
        'adsubmenu_id',
        'adsubmenu_status',
        'adsubmenu_item',
        'adsubmenu_file',
        'adsubmenu_desc',

    ];
}
