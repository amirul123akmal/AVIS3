<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transportation extends Model
{
    protected $table = 'transportation';
    protected $primaryKey = 'transID';
    protected $fillable = [
        'vehicleID',
        'driverID',
        'vehiclePlateNumber',
        'vehicleCapacity',
        'vehicleDesc',
        'vehicleStatus'
    ];

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'statusID', 'vehicleStatus');
    }
    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class, 'driverID', 'driverID');
    }
    public function vehicleType(): HasOne
    {
        return $this->hasOne(VehicleType::class, 'vehicleID', 'vehicleID');
    }
    public function transportAssign(): HasMany
    {
        return $this->hasMany(TransportAssign::class, 'transID', 'transID');
    }

}
