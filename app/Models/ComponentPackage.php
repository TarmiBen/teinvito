<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Componentpackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'componentPackages';
    protected $fillable = [
        'id',
        'component_id',
        'package_id',
    ];

    public function Component()
    {
        return $this->belongsTo(Component::class, 'id');
    }

    public function Packages()
    {
        return $this->belongsTo(Package::class, 'id');
    }

    public function Components()
    {
        return $this->hasMany(Component::class, 'component_package_id');
    }
}
