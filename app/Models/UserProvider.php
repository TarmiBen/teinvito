<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProvider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_provider';
    protected $fillable = [
        'id',
        'users_id',
        'company_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


}
