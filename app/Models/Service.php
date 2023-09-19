<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'service';
    protected $fillable = [
        'id',          
        'name', 
        'category_id', 
        'company_id', 
        'description_large', 
        'description_small', 
        'img_src', 
        'keywords',
    ];

    public function servicePackage()
    {
        return $this->hasMany(servicePackage::class, 'service_id');
    }
    
    public function social()
    {
        return $this->hasMany(category::class, 'model_id');
    }

    public function category()
    {
        return $this->hasOne(category::class, 'id');
    }

    public function company()
    {
        return $this->hasOne(company::class, 'id');
    }
}
