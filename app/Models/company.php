<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company';
    protected $fillable = [
        'id',
        'phone',
        'name',
        'email',
        'rfc',
        'street',
        'int',
        'ext',
        'colony',
        'city',
        'state',
        'cp',
        'description',
        'logo',
        'cover',
    ];
}
