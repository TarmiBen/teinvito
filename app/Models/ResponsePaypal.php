<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $id_paypal
 * @property string $status
 * @property string $payer_id
 * @property string $name
 * @property string $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */

class ResponsePaypal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'response_paypal';

    protected $fillable = [
        'id',
        'id_paypal',
        'status',
        'payer_id',
        'name',
        'amount',
    ];
}
