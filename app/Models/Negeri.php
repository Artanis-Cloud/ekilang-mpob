<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'negeri';
    public $timestamps = false;


    protected $fillable = [
        'kod_negeri',
        'nama_negeri',
        'kod_region',
        'nama_region',
        'nama_kumpulan',
        'kod_kumpulan',
    ];

    public function daerahs()
    {
        return $this->hasMany(Daerah::class, 'kod_negeri', 'kod_negeri');

    }
}
