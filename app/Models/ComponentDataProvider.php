<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponentDataProvider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'component_data_provider';
    protected $fillable = [
        'company_id',

        'component_provider_id',

        'key',
        'value',
    ];

    Public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function ComponentProvider()
    {
        return $this->belongsTo(ComponentProvider::class);
    }
}
