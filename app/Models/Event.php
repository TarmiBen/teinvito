<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events';
    protected $fillable = [
        'id',
        'users_id',
        'user_invited_id',
        'type',
        'ceremony_date',
        'event_date',
        'title',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function UserInvited()
    {
        return $this->belongsTo(User::class, 'user_invited_id');
    }

    public function Events_Invitations()
    {
        return $this->belongsTo(Events_invitations::class, 'event_id');
    }
}

