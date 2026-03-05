<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Netdata extends Model
{
    // explicitly define table since Laravel might try to pluralize
    protected $table = 'netdata';

    protected $fillable = [
        'room',
        'isp',
        'dia_ip',
        'bandwidth',
        'ip_address',
        'gateway',
        'ip_public',
    ];
}
