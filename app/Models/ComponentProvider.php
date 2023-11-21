<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponentProvider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'component_provider';
    protected $fillable = [
        'name',
        'model_type',
    ];

    public function SectionComponent()
    {
        return $this->hasMany(SectionComponent::class, 'id');
    }

    public function ComponentViewData()
    {
        return $this->hasMany(ComponentData::class);
    }

    public function ComponentViewDataOrder()
    {
        $ComponentDataProvider = [];
        foreach ($this->ComponentDataProvider as  $value) {
            $ComponentDataProvider[$value->key] = $value->value;
        }
        return $ComponentDataProvider;
    }
}
