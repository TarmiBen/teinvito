<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'platform';

    protected $fillable = [
        'id',
        'name',
    ];

    public function ResponseMessages()
    {
        return $this->hasMany(ResponseMessage::class, 'platform_id');
    }
    
}
