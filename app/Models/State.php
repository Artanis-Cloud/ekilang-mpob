<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'state';

    protected $fillable = [
        'kod_negeri',
        'nama_negeri',
        'kod_region',
        'nama_region',
        'nama_kumpulan',
    ];
}
