<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class package extends Model
=======
class Packages extends Model
>>>>>>> develop
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'package';
    protected $fillable = [
        'id',
        'name',
    ];

<<<<<<< HEAD
    public function invitations()
=======
    public function Invitations()
>>>>>>> develop
    {
        return $this->hasMany(invitation::class, 'package_id');
    }

<<<<<<< HEAD
    public function componentsPackage()
=======
    public function ComponentPackages()
>>>>>>> develop
    {
        return $this->hasMany(Componentpackage::class, 'package_id');
    }
}
