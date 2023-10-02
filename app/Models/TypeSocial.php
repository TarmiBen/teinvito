<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeSocial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'type_social';
    protected $fillable = [
        'id',          
        'name', 
        'icon',        
    ];

    public function Social(){
        return $this->belongTo(Social::class, 'type_social_id');
    }
}
