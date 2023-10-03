<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserProvider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'userProvider';
    protected $fillable = [
        'id',
        'users_id',
        'company_id',
        'is_boss'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
