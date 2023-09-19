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

    public function users()
    {
        return $this->BelongsTo(users::class, 'id');
    }

    public function company()
    {
        return $this->BelongTo(company::class, 'id');
    }
}
