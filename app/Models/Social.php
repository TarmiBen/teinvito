<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\types_socials;

class socials extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'social';
    protected $fillable = [
        'id', 
        'model', 
        'model_id', 
        'type_social', 
        'url',        
    ];

    public function type_social()
    {
        return $this->hasOne(type_social::class, 'id');
    }
    
    public function company()
    {
        return $this->belongsTo(company::class, 'id');
    }

    public function service()
    {
        return $this->belongsTo(service::class, 'id');
    }
}
