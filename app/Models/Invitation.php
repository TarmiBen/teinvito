<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invitations';
    protected $fillable = [
        'id',
        'user_id',
        'package_id',        

    ];
    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Event()
    {
        return $this->hasOne(Event::class, 'invitation_id');
    }

    public function Package()
    {
        return $this->belongsTo(Package::class, 'id');
    }

    public function InvitationsComponents()
    {
        return $this->hasMany(InvitationComponent::class);
    }

    public function ComponentsData()
    {
        return $this->hasMany(ComponentData::class);
    }
    
    public function Guests()
    {
        return $this->hasMany(Guests::class, 'invitation_id');
    }

    public function Events_Invitations()
    {
    return $this->belongsTo(Events_Invitations::class, 'invitation_id');
    }

    public static function getCounts()
    {
        return [
            'total' => self::count(),
            'monthly' => self::whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->count(),
            'yearly' => self::whereYear('created_at', '=', date('Y'))
                ->count(),
            'deleted' => self::onlyTrashed()->count(),
        ];
    }
}
