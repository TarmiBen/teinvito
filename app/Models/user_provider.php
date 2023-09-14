<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_provider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_provider';
    protected $fillable = [
        'id',
        'user_id',
        'company_id',
    ];

    public function users_provider()
    {
        return $this->hasMany(users::class, 'users');
    }
}
