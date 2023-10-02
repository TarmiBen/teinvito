<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_socials extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'type_social';
    protected $fillable = [
        'id',          
        'name', 
        'icon',        
    ];

    public function social(){
        return $this->belongTo(social::class, 'type_social_id');
    }
}
