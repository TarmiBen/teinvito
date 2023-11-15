<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionComponent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'section_components';
    protected $fillable = [
        'section_id',
        'component_id',
        'order',
    ];

    Public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function Component_View()
    {
        return $this->belongsTo(ComponentData::class, 'component_id');
    }
}
