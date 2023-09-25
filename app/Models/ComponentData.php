<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentData extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'component';
    protected $fillable = [
        'id',
        'invitation_id',
        'component_id',
        'key',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function components(){
        return $this->belongsTo(Component::class, 'id');
    }

    public function invitations(){
        return $this->belongsTo(invitation::class, 'id');
    }
}
