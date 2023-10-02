<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invitations';
    protected $fillable = [
        'id',
        'user_id',
        'package_id',
    ];

    public function event()
    {
        return $this->hasOne(Event::class, 'invitation_id');
    }

    public function packages()
    {
        return $this->belongsTo(packages::class, 'id');
    }

<<<<<<< HEAD
    public function invitationComponents()
=======
    public function InvitationsComponents()
>>>>>>> develop
    {
        return $this->hasMany(invitationComponent::class, 'invitation_id');
    }

    public function ComponentsData()
    {
        return $this->hasMany(ComponentData::class, 'invitation_id');
    }
<<<<<<< HEAD
=======
    
    public function Guests()
    {
        return $this->hasMany(Guests::class, 'invitation_id');
    }

    public function Events_Invitations()
    {
    return $this->belongsTo(Events_Invitations::class, 'invitation_id');
    }
>>>>>>> develop
}
