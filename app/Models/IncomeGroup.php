<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class IncomeGroup extends Model
{
    protected $table = 'incomegroup';
    protected $primaryKey = 'incomeGroupID';
    protected $fillable = [
        'groupType'
    ];

    public function beneficiary(): BelongsToMany
    {
        return $this->belongsToMany(Beneficiary::class, 'incomeGroupID', 'incomeGroupID');
    }

    /**
     * @method static \Illuminate\Database\Eloquent\Collection|static[] allCached()
     * Retrieve all income groups from the cache or database.
     */
    public static function allCached()
    {
        return Cache::remember('income_groups.all', 3600, function () {
            return static::all();
        });
    }
}
