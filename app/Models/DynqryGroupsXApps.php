<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynqryGroupsXApps extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'dynqry_groups_x_apps';

    protected $fillable = [
        'cod_group',
        'cod_application',
    ];
}
