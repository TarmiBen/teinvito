<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'id',        
        'name',        
        'street',
        'int',
        'ext',
        'cp',
        'colony',
        'city',
        'state',        
    ];
}
