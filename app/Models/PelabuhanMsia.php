<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelabuhanMsia extends Model
{
    use HasFactory;
    protected $table = 'pelabuhan_msia';

    protected $fillable = [
        'kod_pelabuhan',
        'nama_pelabuhan',
        'kaw_pelabuhan',
        'negeri_pelabuhan',
    ];
}
