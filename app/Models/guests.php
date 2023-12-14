<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class guests extends Model
{

        use HasFactory;
        use SoftDeletes;

        protected $table = 'guests';
        protected $fillable = [
            'id',
            'hash',
            'invitation_id',
            'name',
            'lastname',
            'phone',
            'email',
            'number',
            'status int',
        ];

        public function Invitation()
        {
            return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
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
