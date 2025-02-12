<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BeneficiaryActivity extends Model
{
    protected $table = 'benActivity';
    protected $primaryKey = 'benActivityID';
    public $timestamps = false;
    protected $fillable = [
        'benID',
        'activityID'
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activityID', 'activityID');
    }

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(Beneficiary::class, 'benID', 'benID');
    }
}
