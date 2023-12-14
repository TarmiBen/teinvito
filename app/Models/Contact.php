<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contacts';
    protected $fillable = [
        'id', 
        'company_id', 
        'name', 
        'lastname', 
        'email', 
        'phone', 
        'telephone',         
    ];

    public function Company()
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

