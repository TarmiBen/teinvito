<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
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

    public function ServicePackage()
    {
        return $this->belongsTo(ServicePackage::class, 'id');
    }
<<<<<<< HEAD
    
=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
