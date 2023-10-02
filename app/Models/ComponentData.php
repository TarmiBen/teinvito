<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'component_data';

    protected $fillable = [

        'invitation_id',
        'component_id',
        'key',
        'value',

    ];

    public function components(){
        return $this->belongsTo(Component::class, 'id');
    }

    public function invitations(){
        return $this->belongsTo(invitation::class, 'id');
    }
}
