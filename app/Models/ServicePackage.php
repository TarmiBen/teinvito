<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_package extends Model
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

    public function Galery(){
        return $this->hasMany(Galery::class, 'service_package_id');
    }

    public function Service()
    {
        return $this->belongsTo(Service::class, 'id');
    }
}
