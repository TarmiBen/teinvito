<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company';
    protected $fillable = [
        'id',
        'phone',
        'name',
        'email',
        'rfc',
        'street',
        'int',
        'ext',
        'colony',
        'city',
        'state',
        'cp',
        'description',
        'logo',
        'cover',
    ];

    public function userProvider()
    {
        return $this->hasOne(userProvider::class, 'company_id');
    }

    public function social()
    {
        return $this->hasMany(social::class, 'model_id');
    }

    public function service()
    {
        return $this->belongTo(service::class, 'company_id');
    }

    public function contact()
    {
        return $this->hasMany(contact::class, 'company_id');
    }

}
