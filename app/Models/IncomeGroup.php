<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IncomeGroup extends Model
{
    protected $table = 'incomeGroup';
    protected $primaryKey = 'incomeGroupID';
    protected $fillable = [
        'groupType'
    ];

    public function beneficiary(): BelongsToMany
    {
        return $this->belongsToMany(Beneficiary::class, 'incomeGroupID', 'incomeGroupID');
    }
}
