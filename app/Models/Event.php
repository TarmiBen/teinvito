<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'event';
    protected $fillable = [
        'id',
        'user_id',
        'user_invited_id',
        'invitation_id',
        'type',
        'ceremony_date',
        'event_date',
        'title',
    ];

    public function invitation()
    {
        return $this->belongTo(invitation::class, 'id');
    }
}
