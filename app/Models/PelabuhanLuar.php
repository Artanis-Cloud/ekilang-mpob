<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelabuhanLuar extends Model
{
    use HasFactory;
    protected $table = 'pelabuhan_luar';

    protected $fillable = [
        'kod_pelabuhan',
        'nama_pelabuhan',
        'kodnegara',
        'namanegara',
    ];
}
