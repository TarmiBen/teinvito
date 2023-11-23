<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'section';
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
    ];

    Public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    Public function User()
    {
        return $this->belongsTo(User::class);
    }

    Public function SectionComponent()
    {
        return $this->hasMany(SectionComponent::class);
    }

    Public function ComponentViewData()
    {
        return $this->hasMany(ComponentProvider::class);
    }
}
