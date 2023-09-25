<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    public function InvitationComponent()
    {
        return $this->hasMany(InvitationComponent::class, 'component_id');
    }

    public function ComponentData()
    {
        return $this->hasMany(ComponentData::class, 'component_id');
    }

    public function ComponentPackage()
    {
        return $this->belongsTo(ComponentPackage::class, 'id');
    }
}
