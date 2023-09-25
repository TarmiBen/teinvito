<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
<<<<<<< HEAD
    use HasFactory;
    use SoftDeletes;

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
    protected $table = 'invitation';
    protected $fillable = [
        'id',
        'user_id',
        'package_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function Event()
    {
        return $this->hasOne(Event::class, 'invitation_id');
    }

    public function Package()
    {
        return $this->belongsTo(Package::class, 'id');
    }

    public function InvitationComponent()
    {
        return $this->hasMany(InvitationComponent::class, 'invitation_id');
    }

    public function ComponentData()
    {
        return $this->hasMany(ComponentData::class, 'invitation_id');
    }
<<<<<<< HEAD
    

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
