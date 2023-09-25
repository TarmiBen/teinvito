<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentpackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'component';
    protected $fillable = [
        'id',
        'component_id',
        'package_id',
    ];

    public function components()
    {
        return $this->belongsTo(Component::class, 'id');
    }

    public function packages()
    {
        return $this->belongsTo(package::class, 'id');
    }
}
