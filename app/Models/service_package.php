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

    public function galeries(){
        return $this->hasMany(galery::class, 'service_package_id');
    }

    public function services()
    {
        return $this->BelongsTo(services::class, 'id');
    }
}
