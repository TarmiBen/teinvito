<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
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

    public function Company()
    {
        return $this->belongsTo(Company::class, 'id');
    }

    public function TypeSocial()
    {
        return $this->hasOne(TypeSocial::class, 'id');
    }
    
    public function Service()
    {
        return $this->belongsTo(Service::class, 'id');
    }
}
