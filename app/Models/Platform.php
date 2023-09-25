<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platform extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'platform';

    protected $fillable = [
        'id',
        'name',
    ];

    public function responseMessages()
    {
        return $this->hasMany(responseMessage::class, 'platform_id');
    }
    
}
