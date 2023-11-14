<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class events_invitations extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events_invitations';
    protected $fillable = [
        'id',
        'event_id',
        'invitation_id',
    ];

    public function invitation()
    {
        return $this->hasOne(invitations::class, 'id');
    }
    
    public function events()
    {
    return $this->hasMany(Event::class, 'id');
    }
}
