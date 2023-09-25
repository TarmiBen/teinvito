<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Componentpackage extends Model
{
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
    use HasFactory;
    use SoftDeletes;
    protected $table = 'componentPackage';
    protected $fillable = [
        'id',
        'component_id',
        'package_id',
    ];

    public function Component()
    {
        return $this->belongsTo(Component::class, 'id');
    }

    public function Package()
    {
        return $this->belongsTo(Package::class, 'id');
    }

    public function Components()
    {
        return $this->hasMany(Component::class, 'component_package_id');
    }
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
