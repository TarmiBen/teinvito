<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
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

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function ServicePackage()
    {
        return $this->hasMany(ServicePackage::class, 'id');
    }
    
    public function Social()
    {
        return $this->hasMany(Social::class, 'model_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
