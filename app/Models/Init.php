<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'init'; //penyata bulanan terkini - kilang penapis (initialize - proses 3)
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'tahun',
        'bulan',
        'sjan',
        'ejan',
        'sfeb',
        'efeb',
        'smac',
        'emac',
        'sapr',
        'eapr',
        'smei',
        'emei',
        'sjun',
        'ejun',
        'sjul',
        'ejul',
        'sogos',
        'eogos',
        'ssept',
        'esept',
        'sokt',
        'eokt',
        'snov',
        'enov',
        'sdec',
        'edec',

    ];




}
