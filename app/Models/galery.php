<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'galery';
    protected $fillable = [
        'id',
        'service_package_id',
        'src',
        'title',
        'text',
    ];

    public function servicePackage()
    {
        return $this->belongsTo(servicePackage::class, 'id');
    }
<<<<<<< HEAD
    
=======
>>>>>>> develop
}
