<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_package extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicePackage';
    protected $fillable = [
        'id', 
        'service_id', 
        'name', 
        'description', 
        'price',         
    ];

    public function galery(){
        return $this->hasMany(galery::class, 'service_package_id');
    }

    public function service()
    {
        return $this->belongsTo(service::class, 'id');
    }
}
