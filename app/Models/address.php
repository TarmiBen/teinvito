<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
<<<<<<< HEAD
    use HasFactory;
    use SoftDeletes;
=======

>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
    protected $table = 'address';
    protected $fillable = [
        'id',        
        'name',        
        'street',
        'int',
        'ext',
        'cp',
        'colony',
        'city',
        'state',        
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'id');
    }
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
