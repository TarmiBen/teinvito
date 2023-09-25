<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
<<<<<<< HEAD
    

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
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
    
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
