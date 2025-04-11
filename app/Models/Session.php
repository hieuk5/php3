<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';

    public $fileable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];
}
