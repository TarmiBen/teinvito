<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'package';
    protected $fillable = [
        'id',
        'name',
    ];

    public function invitations()
    {
        return $this->hasMany(invitation::class, 'package_id');
    }

    public function componentsPackage()
    {
        return $this->hasMany(Componentpackage::class, 'package_id');
    }
}
