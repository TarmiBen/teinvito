<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'companies';
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
<<<<<<< HEAD
        return $this->hasOne(userProvider::class, 'company_id');
    }

    public function social()
=======
        return $this->hasOne(UserProvider::class, 'company_id');
    }
    
    public function Contacts()
    {
        return $this->hasMany(Contact::class, 'company_id');
    }

    public function Socials()
>>>>>>> develop
    {
        return $this->hasMany(social::class, 'model_id');
    }

<<<<<<< HEAD
    public function service()
=======
    public function Services()
>>>>>>> develop
    {
        return $this->belongTo(service::class, 'company_id');
    }

<<<<<<< HEAD
    public function contact()
=======
    public function Addresses()
>>>>>>> develop
    {
        return $this->hasMany(contact::class, 'company_id');
    }

}
