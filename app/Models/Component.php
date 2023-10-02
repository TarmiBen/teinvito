<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'component';


    protected $fillable = [
        'component_package_id',
        'name',
        'model_type',

    ];

    public function InvitationComponent()

    {
        return $this->hasMany(invitationComponent::class, 'component_id');
    }


    public function ComponentsData()

    {
        return $this->hasMany(ComponentData::class, 'component_id');
    }

    public function componentsPackages()
    {

        return $this->belongsTo(ComponentPackage::class, 'id');

    }
}
