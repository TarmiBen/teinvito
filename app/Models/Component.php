<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{

<<<<<<< HEAD
=======
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
        //return $this->hasMany(ComponentPackage::class, 'id');
        return $this->belongsTo(ComponentPackage::class, 'id');
    }
>>>>>>> develop
}
