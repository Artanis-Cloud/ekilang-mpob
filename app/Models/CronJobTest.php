<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronJobTest extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'cron_job_test'; //penyata bulanan terkini - kilang penapis (initialize - proses 3)
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'date',
        'data',

    ];



}
