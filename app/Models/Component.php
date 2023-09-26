<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $table = 'components';
    protected $fillable = [
        
        'component_package_id',
        'name',
        'model_type',
        
    ];

    public function InvitationsComponents()
    {
        return $this->hasMany(InvitationComponent::class, 'component_id');
    }

    public function ComponentsData()
    {
        return $this->hasMany(ComponentData::class, 'component_id');
    }

    public function ComponentPackage()
    {
        //return $this->hasMany(ComponentPackage::class, 'id');
        return $this->belongsTo(ComponentPackage::class, 'id');
    }

}
