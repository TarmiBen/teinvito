<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responseMessage extends Model
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

    public function platforms()
    {
        return $this->belongsTo(invitation::class, 'id');
    }
}
