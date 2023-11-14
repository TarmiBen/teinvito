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
        'service_package_id',
        'src',
        'tittle',
        'text',
    ];

    public function ServicePackage()
    {
        return $this->belongsTo(ServicePackage::class, 'service_package_id');
    }
}
