<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponentData extends Model
{
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
    use HasFactory;
    use SoftDeletes;
    protected $table = 'component';
    protected $fillable = [
        'id',
        'invitation_id',
        'component_id',
        'key',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Component(){
        return $this->belongsTo(Component::class, 'id');
    }

    public function Invitation(){
        return $this->belongsTo(Invitation::class, 'id');
    }
<<<<<<< HEAD

=======
>>>>>>> bf38eefba110ce1802cc7989ef8b250e2954c3d2
}
