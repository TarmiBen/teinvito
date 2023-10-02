<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packages extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'packages';
    protected $fillable = [
        'id',
        'name',
    ];

    public function Invitations()
    {
        return $this->hasMany(Invitation::class, 'package_id');
    }

    public function ComponentPackages()
    {
        return $this->hasMany(Componentpackage::class, 'package_id');
    }
}
