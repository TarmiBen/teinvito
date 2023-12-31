<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'modelo';
    protected $fillable = [
        'id',
        'model',
    ];
}
