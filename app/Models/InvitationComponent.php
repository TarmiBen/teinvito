<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitationComponent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'invitationcomponent';
    protected $fillable = [
        'id',
        'invitation_id',
        'component_id',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invitations()
    {
        return $this->belongsTo(invitation::class, 'id');
    }

    public function components()
    {
        return $this->belongsTo(Component::class, 'id');
    }
}
