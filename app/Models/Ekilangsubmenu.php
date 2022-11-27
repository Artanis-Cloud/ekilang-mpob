<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekilangsubmenu extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekilangsubmenu'; //table submenu (akses by)

    public $timestamps = false;

    protected $fillable = [
        'submenu_id',
        'menu_id',
        'submenu_status',
        'submenu_status_borang',
        'submenu_item',
        'submenu_file',
        'submenu_desc',

    ];
}
