<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Beneficiary extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'beneficiary';
    protected $primaryKey = 'benID';
    protected $fillable = [
        'actorID',
        'statusID',
        'incomeGroupID'
    ];

    protected $attributes = [
        'statusID' => 4,
        'incomeGroupID' => null
    ];

    public function actor(): BelongsTo
    {
        return $this->belongsTo(Actor::class, 'actorID', 'actorID');
    }

    public function incomeGroup(): HasOne
    {
        return $this->hasOne(IncomeGroup::class, 'incomeGroupID', 'incomeGroupID');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'statusID', 'statusID');
    }

    public function beneficiaryActivity(): HasMany
    {
        return $this->hasMany(BeneficiaryActivity::class, 'benID', 'benID');
    }

    public function requestTransport(): HasMany
    {
        return $this->hasMany(RequestTransport::class, 'benID', 'benID');
    }

    public function requestBeneficiary(): HasOne
    {
        return $this->hasOne(RequestBeneficiary::class, 'benID', 'benID');
    }

}
