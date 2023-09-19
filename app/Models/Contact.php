<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contact';
    protected $fillable = [
        'id', 
        'company_id', 
        'name', 
        'lastname', 
        'email', 
        'phone', 
        'telephone',         
    ];

    public function company()
    {
        return $this->belongsTo(company::class, 'id');
    }
}