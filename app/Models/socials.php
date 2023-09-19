<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\types_socials;

class socials extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'socials';
    protected $fillable = [
        'id', 
        'model', 
        'model_id', 
        'type_social', 
        'url',        
    ];

    public function type_social()
    {
        return $this->hasOne(types_socials::class, 'id');
    }
    
    public function company()
    {
        return $this->BelongsTo(company::class, 'id');
    }

    public function service()
    {
        return $this->BelongsTo(service::class, 'id');
    }
}
