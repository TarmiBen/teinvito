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
    protected $table = 'userprovider';
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

    public static function getCounts()
    {
        return [
            'total' => self::count(),
            'monthly' => self::whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->count(),
            'yearly' => self::whereYear('created_at', '=', date('Y'))
                ->count(),
            'deleted' => self::onlyTrashed()->count(),
        ];
    }
}
