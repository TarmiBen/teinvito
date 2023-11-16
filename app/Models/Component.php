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
        return $this->hasMany(ComponentData::class, 'component_id', 'id');
    }

    public function ComponentPackage()
    {
        return $this->belongsTo(ComponentPackage::class, 'id');
    }
    public function componentDataOrder()
    {
        $componentDataOrder2 = [];
        $i = 0;
        foreach ($this->ComponentsData as  $value) {
            $componentData[$value->key] = $value->value;
            $componentsDataOrder2[$i] = $componentData;
            // dd($componentData);
            $i++;
        }

        // dd($this->ComponentsData);
        return $componentDataOrder2;
    }

    public function componentDataOrderInvitation($id)
    {
        $format = [];
        $componentData = ComponentData::where('invitation_id', $id)->where('component_id', $this->id)->get();
        foreach ($componentData as  $item) {
            $format[$item->key] = $item->value;
        }
        return $format;
    }
}
