<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_socials extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'types_socials';
    protected $fillable = [
        'id',          
        'name', 
        'icon',        
    ];

    public function types_socials(){
        return $this->hasOne(socials::class, 'type_social');
    }
}
