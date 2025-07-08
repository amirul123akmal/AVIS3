<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;
class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'activityID';
    protected $fillable = [
        'activityName',
        'activityPlace',
        'dateStart',
        'dateEnd',
        'timeStart',
        'timeEnd',
        'volunteerCount',
        'beneficiaryCount',
        'activityImage',
        'activityDescription'
    ];

    public function actorActivity(): HasMany
    {
        return $this->hasMany(actorActivity::class, 'activityID', 'activityID');
    }
    public function beneficiaryActivity(): HasMany
    {
        return $this->hasMany(BeneficiaryActivity::class, 'activityID', 'activityID');
    }

    public static function allCached()
    {
        return Cache::remember('activity.all', 3600, function () {
            return static::all();
        });
    }
}
