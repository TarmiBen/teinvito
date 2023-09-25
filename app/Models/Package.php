<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'packages';
    protected $fillable = [
        'id',
        'name',
    ];

    public function Invitation()
    {
        return $this->hasMany(Invitation::class, 'package_id');
    }

    public function ComponentPackage()
    {
        return $this->hasMany(Componentpackage::class, 'package_id');
    }
}
