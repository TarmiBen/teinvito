<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'galery';
    protected $fillable = [
        'id',
        'service_package_id',
        'src',
        'title',
        'text',
    ];

    public function ServicePackage()
    {
        return $this->belongsTo(ServicePackage::class, 'id');
    }
    
}
