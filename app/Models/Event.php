<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    
<<<<<<< HEAD
=======
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
    
    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function Invitation()
    {
        return $this->belongTo(Invitation::class, 'id');
    }
    
>>>>>>> develop
}
