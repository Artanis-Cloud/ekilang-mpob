<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekilangmenu extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekilangmenu'; //table menu (akses by pelesen)
    public $timestamps = false;


    protected $fillable = [
        'menu_id',
        'menu_status',
        'menu_item',
        'menu_file',
        'menu_desc',

    ];
}
