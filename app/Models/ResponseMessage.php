<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResponseMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'platform_id',
        'reference',
        'status',
        'status_detail',
        'cardholder',
        'card',
        'amount',        
        'created_at',
    ];

    public function Platform()
    {
        return $this->belongsTo(Platform::class, 'id');
    }
}
