<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VehicleType extends Model
{
    protected $table = 'vehicletype';
    protected $primaryKey = 'vehicleID';
    protected $fillable = [
        'vehicleType'
    ];

    public function requestTransport(): BelongsToMany
    {
        return $this->belongsToMany(RequestTransport::class, 'vehicleID', 'vehicleID');
    }
    public function transportation(): BelongsToMany
    {
        return $this->belongsToMany(Transportation::class, 'vehicleID', 'vehicleID');
    }
}
