<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentpackage extends Model
{
    use HasFactory;
    use SoftDeletes;
<<<<<<< HEAD
    protected $table = 'component';
=======
    protected $table = 'componentPackages';
>>>>>>> develop
    protected $fillable = [
        'id',
        'component_id',
        'package_id',
    ];

    public function components()
    {
        return $this->belongsTo(Component::class, 'id');
    }

<<<<<<< HEAD
    public function packages()
=======
    public function Packages()
>>>>>>> develop
    {
        return $this->belongsTo(package::class, 'id');
    }
<<<<<<< HEAD
=======

    public function Components()
    {
        return $this->hasMany(Component::class, 'component_package_id');
    }
>>>>>>> develop
}
