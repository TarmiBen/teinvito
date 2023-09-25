<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Component extends Model
{
    use HasFactory;

    protected $table = 'component';
    protected $fillable = [
        'id',
        'component_package_id',
        'name',
        'model_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invitationComponents()
    {
        return $this->hasMany(invitationComponent::class, 'component_id');
    }

    public function componentsData()
    {
        return $this->hasMany(ComponentData::class, 'component_id');
    }

    public function componentsPackages()
    {
        return $this->hasMany(Componentpackage::class, 'component_id');
    }
}
