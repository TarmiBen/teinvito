<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'component_package_id',
        'name',
        'model_type',
        
    ];
    public function InvitationComponent()
    {
        return $this->hasMany(InvitationComponent::class, 'component_id');
    }

    public function ComponentsData()
    {
        return $this->hasMany(ComponentData::class);
    }

    public function ComponentPackage()
    {
        return $this->belongsTo(ComponentPackage::class, 'id');
    }
    public function componentDataOrder()
    {
        $componentDataOrder = [];
        foreach ($this->ComponentsData as  $value) {
            $componentDataOrder[$value->key] = $value->value;
        }
        return $componentDataOrder;
    }
}
