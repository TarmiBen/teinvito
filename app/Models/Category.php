<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'id',
        'category_id',
        'name',
    ];

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }    
    public function CategoryParent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function CategorysChild()
    {
        return $this->hasMany(Category::class, 'category_id');
    } 
    
    public function Service()
    {
        return $this->hasOne(Service::class, 'category_id');
    }

    public static function getCounts()
    {
        return [
            'total' => self::count(),
            'monthly' => self::whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->count(),
            'yearly' => self::whereYear('created_at', '=', date('Y'))
                ->count(),
            'deleted' => self::onlyTrashed()->count(),
        ];
    }
}
