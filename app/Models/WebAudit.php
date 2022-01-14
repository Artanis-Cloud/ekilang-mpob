<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebAudit extends Model
{
    use HasFactory;

    protected $table = 'web_audit';

    protected $fillable = [
        'year_access',
        'month_access',
        'no_report',
        'userid',
        'access',
    ];

}
