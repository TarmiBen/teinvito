<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_providers;

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

    public function user_providers()
    {
        return $this->hasOne(user_providers::class, 'company_id');
    }

    public function socials()
    {
        return $this->hasMany(socials::class, 'model_id');
    }

    public function service()
    {
        return $this->BelongTo(service::class, 'company_id');
    }

    public function contacts()
    {
        return $this->hasMany(contacts::class, 'company_id');
    }

}
