<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_package extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'service_package';
    protected $fillable = [
        'id', 
        'service_id', 
        'name', 
        'description', 
        'price',         
    ];

    public function galery(){
        return $this->belongTo(galery::class, 'id');
    }

    public function services()
    {
        return $this->hasMany(services::class, 'service_id');
    }
}
