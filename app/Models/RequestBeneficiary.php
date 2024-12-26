<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestBeneficiary extends Model
{
    protected $table = 'requestBeneficiary';
    protected $primaryKey = 'reqID';
    protected $fillable = [
        'benID',
        'numDependents',
        'incomeDocument',
        'supportDocument',
        'asnafCardDocument',
    ];

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(Beneficiary::class, 'benID', 'benID');
    }
}
