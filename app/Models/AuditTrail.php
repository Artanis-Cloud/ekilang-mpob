<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;
    protected $table = 'audit_trails'; //bulan

    protected $fillable = [
        'username',
        'activity',
        'date',
        'ip',
    ];

    public function user(){
        return $this->belongsTo(User::class,);
    }
}
