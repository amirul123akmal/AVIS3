<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestTransport extends Model
{
    protected $table = 'requestTransport';
    protected $primaryKey = 'reqID';
    protected $fillable = [
        'benID',
        'addressFrom',
        'addressTo',
        'dateReq',
        'vehicleID'
    ];

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(Beneficiary::class, 'benID', 'benID');
    }

    public function transportAssign(): HasMany
    {
        return $this->hasMany(TransportAssign::class, 'benID', 'benID');
    }

    public function vehicleType(): HasOne
    {
        return $this->hasOne(VehicleType::class, 'vehicleID', 'vehicleID');
    }
}
