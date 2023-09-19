<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'services';
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

    public function services_package()
    {
        return $this->hasMany(services_package::class, 'service_id');
    }
    
    public function socials()
    {
        return $this->HasMany(category::class, 'model_id');
    }

    public function category()
    {
        return $this->HasOne(category::class, 'id');
    }

    public function company()
    {
        return $this->HasOne(company::class, 'id');
    }
}
