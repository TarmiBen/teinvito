<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvitationComponent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'invitation_components';
    protected $fillable = [
        'id',
        'invitation_id',
        'component_id',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }

    public function Component()
    {
        return $this->belongsTo(Component::class, 'component_id','id');
    }
}
