<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'id', 
        'email', 
        'name', 
        'lastname', 
        'phone', 
        'email_verified_at', 
        'password', 
        'remember_token', 
    ];

    public function users_provider(){
        return $this->HasMany(user_provider::class, 'user_id');
    }
}
