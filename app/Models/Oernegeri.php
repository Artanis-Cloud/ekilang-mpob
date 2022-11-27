<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oernegeri extends Model
{
    use HasFactory;

/**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'oernegeri';
    public $timestamps = false;

    protected $fillable = [

        'oernegeri_id',
        'tahun',
        'bulan',
        'negeri',
        'oer_cpo',
        'oer_cpko',
        'ker_pk',
        'ker_pkc',
        'cpo_proc',
        'ffb_proc',
  ];
}
