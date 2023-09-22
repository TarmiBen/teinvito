<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
<<<<<<< HEAD
    use HasFactory;
    use SoftDeletes;
    protected $table = 'components';
    protected $fillable = [
        'id',
        'component_package_id',
        'name',
        'model_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
=======
>>>>>>> 2b28387ed099f848fe1f0dc64daca5e59fc11120

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
}
