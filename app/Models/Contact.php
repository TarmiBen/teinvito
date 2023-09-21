<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
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

    public function Company()
    {
        return $this->belongsTo(Company::class, 'id');
    }
}
