<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekilangadminmenu extends Model
{
    use HasFactory;

/**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'ekilangadminmenu'; //table menu (akses by admin)

    protected $fillable = [
        'admenu_id',
        'admenu_status',
        'admenu_item',
        'admenu_file',
        'admenu_desc',

    ];

}
