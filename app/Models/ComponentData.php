<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function Component(){
        return $this->belongsTo(Component::class, 'id');
    }

    public function Invitation(){
        return $this->belongsTo(Invitation::class, 'id');
    }
}
