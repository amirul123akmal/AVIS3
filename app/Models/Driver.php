<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    protected $table = 'driver';
    protected $primaryKey = 'driverID';
    protected $fillable = [
        'driverName',
        'driverPhoneNum'
    ];

    public function transportation(): BelongsTo
    {
        return $this->belongsTo(Transportation::class, 'driverID', 'driverID');
    }
}
