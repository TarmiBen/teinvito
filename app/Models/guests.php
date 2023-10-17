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
            return $this->belongsTo(Component::class, 'id');
        }
    
}
