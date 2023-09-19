<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'id',
        'category_id',
        'name',
    ];

    public function category()
    {
        return $this->hasOne(categories::class, 'id');
    }    

    public function service()
    {
        return $this->belongTo(services::class, 'category_id');
    }
}
