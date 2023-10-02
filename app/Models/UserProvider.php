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
        'user_id',
        'company_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function Company()
    {
        return $this->belongTo(Company::class, 'id');
    }


}
