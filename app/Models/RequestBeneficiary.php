<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestBeneficiary extends Model
{

    public $timestamps = false;

    protected $table = 'requestBeneficiary';
    protected $primaryKey = 'reqID';
    protected $fillable = [
        'benID',
        'numDependents',
        'incomeDocument',
        'supportDocument',
        'asnafCardDocument',
    ];

    protected $attributes = [
        'numDependents' => 0,
        'incomeDocument' => null,
        'supportDocument' => null,
        'asnafCardDocument' => null,
    ];

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(Beneficiary::class, 'benID', 'benID');
    }
}
