<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

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

    protected $hidden = [
        'password', 
        'remember_token', 
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function UserProvider(){
        return $this->hasMany(UserProvider::class, 'users_id');
    }

    public function Event(){
        return $this->hasMany(Event::class, 'user_id');
    }

    public function Invitation(){
        return $this->hasMany(Invitation::class, 'user_id');
    }
}

