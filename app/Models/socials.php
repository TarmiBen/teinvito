<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socials extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'socials';
    protected $fillable = [
        'id', 
        'model', 
        'model_id', 
        'type_social', 
        'url',        
    ];
}
