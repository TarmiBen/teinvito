<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $user_invited_id
 * @property string $invitation_id
 * @property string $type
 * @property string $ceremony_date
 * @property string $event_date
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */

class Event extends Model
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


    public function Events_Invitations()
    {
        return $this->belongsTo(Events_Invitations::class, 'event_id');
    }

}
