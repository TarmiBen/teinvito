<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
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
        'description',
        'logo',
        'cover',
    ];

    public function UserProvider()
    {
        return $this->hasOne(UserProvider::class, 'company_id');
    }
    
    public function Contacts()
    {
        return $this->hasMany(Contact::class, 'id');
    }

    public function Socials()
    {
        return $this->hasMany(Social::class, 'model_id');
    }

    public function Services()
    {
        return $this->hasMany(Service::class, 'company_id');
    }

    public function Addresses()
    {
        return $this->hasMany(Address::class, 'company_id');
    }
    
}
