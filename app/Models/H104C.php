<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H104C extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h104_c'; //penyata arkib - kilang oleokimia

    protected $fillable = [
        'e104_c1',
        'e104_nobatch',
        'e104_c3',
        'e104_c4',
        'e104_c5',
        'e104_c6',
        'e104_c7',
        'e104_c8',

    ];
}
