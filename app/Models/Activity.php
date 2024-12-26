<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'activityID';
    protected $fillable = [
        'activityName',
        'activityPlace',
        'dateStart',
        'dateEnd',
        'volunteerCount',
        'beneficiaryCount',
    ];

    public function actorActivity(): HasMany
    {
        return $this->hasMany(actorActivity::class, 'activityID', 'activityID');
    }
    public function beneficiaryActivity(): HasMany
    {
        return $this->hasMany(BeneficiaryActivity::class, 'activityID', 'activityID');
    }
}
