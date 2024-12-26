<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class actorActivity extends Model
{
    protected $table = 'actorActivity';
    protected $primaryKey = 'actorActivityID';
    protected $fillable = [
        'actorID',
        'activityID'
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activityID', 'activityID');
    }
    public function actor(): BelongsTo
    {
        return $this->belongsTo(Actor::class, 'actorID', 'actorID');
    }
}
