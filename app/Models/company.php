<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
<<<<<<< HEAD
=======
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

    public function UserProvider()
    {
        return $this->hasOne(UserProvider::class, 'company_id');
    }
    
    public function Contact()
    {
        return $this->hasMany(contact::class, 'company_id');
    }
>>>>>>> develop

    public function Social()
    {
        return $this->hasMany(Social::class, 'model_id');
    }

    public function Service()
    {
        return $this->hasMany(Service::class, 'company_id');
    }

    public function Address()
    {
        return $this->hasMany(Address::class, 'company_id');
    }
    
}
