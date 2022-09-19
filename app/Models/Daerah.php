<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'daerah';

    protected $fillable = [
        'kod_negeri',
        'kod_sbsw',
        'kod_daerah',
        'nama_daerah',
        'nama_daesbsw',
        'kod_combine',
    ];


    public function negeri()
    {
        return $this->belongsTo(Negeri::class, 'kod_negeri', 'kod_negeri');
    }
}
