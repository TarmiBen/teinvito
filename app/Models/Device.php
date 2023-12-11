<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'platform',
        'count',
        'ip',
    ];

    public function ip_address()
    {
        return $this->belongsTo(Ip_address::class, 'ip', 'ip');
    }
}
