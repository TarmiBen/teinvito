<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip_address extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'country',
        'city',
        'state',
    ];

    public function devices()
    {
        return $this->hasMany(Device::class, 'ip', 'ip');
    }
}
