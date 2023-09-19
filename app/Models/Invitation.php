<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'invitation';
    protected $fillable = [
        'id',
        'user_id',
        'package_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function event()
    {
        return $this->hasOne(event::class, 'invitation_id');
    }

    public function packages()
    {
        return $this->belongsTo(packages::class, 'id');
    }

    public function invitationComponents()
    {
        return $this->hasMany(invitationComponent::class, 'invitation_id');
    }

    public function ComponentsData()
    {
        return $this->hasMany(ComponentData::class, 'invitation_id');
    }
}
