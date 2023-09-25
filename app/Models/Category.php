<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'category';
    protected $fillable = [
        'id',
        'category_id',
        'name',
    ];

    public function category()
    {
        return $this->hasOne(category::class, 'id');
    }    

    public function service()
    {
        return $this->belongTo(service::class, 'category_id');
    }
}
